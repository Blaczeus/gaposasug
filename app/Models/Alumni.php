<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumnis'; // Use 'alumnis' as the table name

    protected $fillable = [
        'user_id',
        'graduation_year',
        'course_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
