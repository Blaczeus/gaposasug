<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Department;

class BackfillDepartments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * Options:
     *  --dry-run   : show what would be done without modifying the DB
     */
    protected $signature = 'backfill:departments {--dry-run}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backfill departments from existing courses.department strings. Use --dry-run to preview changes.';

    public function handle()
    {
        $dry = $this->option('dry-run');

        $this->info('Starting departments backfill' . ($dry ? ' (dry-run)' : '') . '...');

        // Pull distinct non-null, non-empty department strings
        $departmentNames = Course::query()
            ->whereNotNull('department')
            ->where('department', '!=', '')
            ->distinct()
            ->pluck('department');

        if ($departmentNames->isEmpty()) {
            $this->line('No department strings found in courses table.');
            return 0;
        }

        $summary = [
            'would_create_departments' => 0,
            'would_update_courses' => 0,
            'created_departments' => 0,
            'updated_courses' => 0,
        ];

        if ($dry) {
            // Dry-run: compute and report what would be done WITHOUT modifying DB
            foreach ($departmentNames as $name) {
                $trimmed = trim($name);
                if ($trimmed === '') continue;

                $exists = Department::where('name', $trimmed)->exists();
                if (! $exists) {
                    $summary['would_create_departments']++;
                    $this->line("Would create department: '{$trimmed}' (slug: " . $this->uniqueSlugForDepartmentPreview($trimmed) . ")");
                } else {
                    $this->line("Department exists: '{$trimmed}'");
                }

                // Resolve department id (if any) in PHP first — avoid subquery usage inside the where closure
                $deptId = Department::where('name', $trimmed)->value('id');

                // Count courses for that string where department_id is null OR not equal to the resolved id
                $count = Course::where('department', $name)
                    ->where(function ($q) use ($deptId) {
                        if ($deptId === null) {
                            // If department doesn't exist yet, we only care about courses with null department_id
                            $q->whereNull('department_id');
                        } else {
                            $q->whereNull('department_id')
                                ->orWhere('department_id', '!=', $deptId);
                        }
                    })->count();

                $summary['would_update_courses'] += $count;
                $this->line("  Courses that would be updated: {$count}");
            }

            $this->info('Dry-run complete.');
            $this->table(
                ['Action', 'Count'],
                [
                    ['Departments to create', $summary['would_create_departments']],
                    ['Courses to update', $summary['would_update_courses']],
                ]
            );

            return 0;
        }

        // Actual run — perform in a transaction
        DB::transaction(function () use (&$summary, $departmentNames) {
            foreach ($departmentNames as $name) {
                $trimmed = trim($name);
                if ($trimmed === '') continue;

                // create or get department with unique slug helper
                $department = Department::firstOrCreate(
                    ['name' => $trimmed],
                    ['slug' => $this->uniqueSlugForDepartment($trimmed)]
                );

                if ($department->wasRecentlyCreated) {
                    $summary['created_departments']++;
                    $this->line("Created department: '{$trimmed}' (id: {$department->id})");
                } else {
                    $this->line("Found department: '{$trimmed}' (id: {$department->id})");
                }

                // update courses that match the original string
                $count = Course::where('department', $name)
                    ->where(function ($q) use ($department) {
                        $q->whereNull('department_id')
                            ->orWhere('department_id', '!=', $department->id);
                    })
                    ->update(['department_id' => $department->id]);

                $summary['updated_courses'] += $count;
                $this->line("Updated {$count} course(s) to department_id = {$department->id}");
            }
        });

        $this->info('Backfill completed.');
        $this->table(
            ['Action', 'Count'],
            [
                ['Departments created', $summary['created_departments']],
                ['Courses updated', $summary['updated_courses']],
            ]
        );

        return 0;
    }
    
    /**
     * Generate a unique slug for the department (used when creating).
     */
    protected function uniqueSlugForDepartment(string $name): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;

        while (Department::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

    /**
     * Preview slug without touching DB (used in dry-run display).
     */
    protected function uniqueSlugForDepartmentPreview(string $name): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;

        while (Department::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
