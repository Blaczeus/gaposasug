<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Student;
use App\Models\Notice;
use App\Models\Department;

class Course extends Model
{
    use HasFactory;

    /**
     * Fillable attributes.
     * Note: we replaced the old 'department' string column with a FK 'department_id'.
     */
    protected $fillable = [
        'name',
        'code',
        'department_id', // <-- changed
        'level',
        'description',
    ];

    /**
     * Relationships
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function notices()
    {
        return $this->belongsToMany(Notice::class, 'course_notice')->withTimestamps();
    }

    /**
     * Convenience accessor: $course->department_name
     * Falls back to null if department not set.
     */
    public function getDepartmentNameAttribute()
    {
        return $this->department?->name;
    }
}
