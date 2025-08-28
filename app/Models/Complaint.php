<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Student;
use App\Models\ComplaintResponse;

class Complaint extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'status',
        'user_id',
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

    public function responses()
    {
        return $this->hasMany(ComplaintResponse::class);
    }
}
