<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;
use App\Enums\StudentLevel;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matric_no',
        'course_id',
        'level',
        'dob',
        'gender',
        'address',
        'photo',
    ];

    public function getRouteKeyName()
    {
        return 'matric_no';
    }

    protected $casts = [
        'level' => StudentLevel::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
