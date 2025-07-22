<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Enums\StudentLevel;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matric_number',
        'department',
        'level',
    ];

    protected $casts = [
        'level' => StudentLevel::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
