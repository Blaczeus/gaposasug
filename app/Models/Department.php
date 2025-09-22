<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'slug'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // optional: only if a department_notice pivot is used;
    public function notices()
    {
        return $this->belongsToMany(Notice::class, 'department_notice')->withTimestamps();
    }
}
