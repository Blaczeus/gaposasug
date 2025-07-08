<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'graduation_year',
        'department',
        'current_job',
        'linkedin_profile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
