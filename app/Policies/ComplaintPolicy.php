<?php

namespace App\Policies;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ComplaintPolicy
{
    /**
     * Only allow admins to view all complaints.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * A user can view their own complaint.
     * Admin can view any.
     */
    public function view(User $user, Complaint $complaint): bool
    {
        return $user->role === 'admin' || $complaint->user_id === $user->id;
    }

    /**
     * Any logged-in user can create a complaint.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['student', 'alumni', 'admin']);
    }

    /**
     * A user can update their own complaint if it's not resolved yet.
     * Admin can update any.
     */
    public function update(User $user, Complaint $complaint): bool
    {
        return $user->role === 'admin' || $complaint->user_id === $user->id;
    }

    /**
     * A user can delete their own complaint.
     * Admin can delete any.
     */
    public function delete(User $user, Complaint $complaint): bool
    {
        return $user->role === 'admin' || $complaint->user_id === $user->id;
    }

    /**
     * Allow restore if same as delete permissions.
     */
    public function restore(User $user, Complaint $complaint): bool
    {
        return $this->delete($user, $complaint);
    }

    /**
     * Only admin can permanently delete.
     */
    public function forceDelete(User $user, Complaint $complaint): bool
    {
        return $user->role === 'admin';
    }
}
