<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Department;
use App\Models\NoticeRead;
use Illuminate\Database\Eloquent\Builder;

class Notice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'admin_id',
        'audience',
        'target_departments',
        'pinned',
        'important',
        'starts_at',
        'ends_at',
        'attachments',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'pinned' => 'boolean',
        'important' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'target_departments' => 'array',
        'attachments' => 'array',
    ];

    /**
     * Scope a query to only include currently active notices.
     */
    public function scopeActive(Builder $q)
    {
        $now = Carbon::now();
        return $q->where(function ($q) use ($now) {
            $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
        })->where(function ($q) use ($now) {
            $q->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
        });
    }

    /**
     * Filter notices visible to given user (audience + optional course scoping).
     */
    public function scopeVisibleTo(Builder $q, $user)
    {
        return $q->where(function ($query) use ($user) {
            $query->where('audience', 'all')
                ->orWhere('audience', $user?->role);

            // If you used the course pivot, include notices tied to user's course(s)
            if ($user?->role === 'student' && $user?->student?->course_id) {
                $courseId = $user->student->course_id;
                $query->orWhereHas('courses', function ($qq) use ($courseId) {
                    $qq->where('courses.id', $courseId);
                });
            }
        });
    }

    /**
     * Returns a builder for notices that are unread by the given user.
     */
    public function scopeUnreadFor(Builder $q, $user)
    {
        return $q->whereDoesntHave('reads', function ($qr) use ($user) {
            $qr->where('user_id', $user?->id);
        });
    }

    /**
     * Get the admin that authored the notice.
     */
    public function author()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    /**
     * Mark the notice as read by a user.
     */
    public function markAsRead($userId)
    {
        $this->reads()->updateOrCreate(
            ['user_id' => $userId],
            ['read_at' => Carbon::now()]
        );
    }

    /**
     * The users who have read the notice.
     */
    public function reads()
    {
        return $this->hasMany(NoticeRead::class);
    }

    // If using course_notice pivot table for targeting specific courses
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_notice')->withTimestamps();
    }

    // If using department_notice pivot table for targeting specific departments
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_notice')->withTimestamps();
    }
}
