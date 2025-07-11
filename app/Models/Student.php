<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matric_number',
        'department',
        'entry_year',
        'graduation_year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
