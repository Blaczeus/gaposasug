<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ComplaintResponse;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position', // President, Secretary, etc.
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responses() {
        return $this->hasMany(ComplaintResponse::class);
    }
}
