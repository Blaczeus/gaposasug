<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'Computer Science',
            'Mechanical Engineering',
            'Mass Communication',
            'Business Administration',
            'Electrical Engineering',
            'Science Laboratory Technology',
            'Agricultural Technology',
            'Civil Engineering',
            'Biology',
            'Chemistry',
            'Urban & Regional Planning',
            'Environmental Management',
            'Accountancy',
            'Library Science',
            'Software Engineering',
            'Information Technology',
            'Hospitality Management',
            'Tourism',
        ];

        foreach ($departments as $name) {
            Department::firstOrCreate(
                ['name' => $name], // check uniqueness by name only
                ['slug' => Str::slug($name)] // set slug if new
            );
        }
    }
}
