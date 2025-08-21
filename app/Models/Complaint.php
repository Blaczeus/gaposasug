<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Student;

class Complaint extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'photo',
    ];

    /**
     * Get the user that owns the complaint.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'user_id','id');
    }
}
