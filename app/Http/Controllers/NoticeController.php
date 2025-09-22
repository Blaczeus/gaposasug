<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\NoticeRead;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoticeController extends Controller
{
    /**
     * Display a listing of active notices for the authenticated user.
     */
    public function index()
    {
        // Fetch active notices targeted to this user
        $user = auth()->user();

        $notices = Notice::active()
            ->where(function ($query) use ($user) {
                $query->where('audience', 'all')
                      ->orWhere('audience', $user->role);
                if ($user->role === 'student' && $user->department) {
                    $query->orWhereJsonContains('target_departments', $user->student->course->department ?? '');
                }
            })
            ->orderByDesc('pinned')
            ->orderByDesc('created_at')
            ->paginate(10);
        return Inertia::render('notices/Index', [
            'notices' => $notices,

            // Optionally send unread counts for this page too
            // 'unread_count' => NoticeRead::where('user_id', $user->id)->whereNull('read_at')->count(),
            'unread_count' => Notice::active()
                ->where(function ($q) use ($user) {
                    $q->where('audience', 'all')
                        ->orWhere('audience', $user->role);
                })
                ->whereDoesntHave('reads', function ($q) use ($user) {
                    $q->where('user_id', $user->id);
                })->count(),
        ]);
    }

    /**
     * Display the specified notice.
     */
    public function show(Notice $notice)
    {
        $user = auth()->user();

        // Mark as read if not already read(Create or upsert)
        $noticeRead = NoticeRead::updateOrCreate(
            ['notice_id' => $notice->id, 'user_id' => $user->id],
            ['read_at' => now()]
        );
        return Inertia::render('notices/Show', [
            'notice' => $notice,
        ]);
    }

    /**
     * Display a listing of unread notices for the authenticated user.
     */
    public function unread()
    {
        $user = auth()->user(); // Get the authenticated user
        $notices = Notice::active()
            ->visibleTo($user)
            ->unreadFor($user)
            ->orderByDesc('pinned')
            ->orderByDesc('created_at')
            ->paginate(10);
        return Inertia::render('notices/Unread', [
            'notices' => $notices,
            'unread_count' => $notices->total(),
        ]);
    }

    /**
     * API endpoint to mark notices as read.
     */
    public function markAsRead(Request $request, Notice $notice)
    {
        $user = auth()->user();

        NoticeRead::updateOrCreate(
            ['notice_id' => $notice->id, 'user_id' => $user->id],
            ['read_at' => now()]
        );

        // Alternatively, you can use the Notice model's method
        // $notice = Notice::find($noticeId);
        // if ($notice) {
        //     $notice->markAsRead($user->id);
        // }

        return response()->json(['message' => 'Notices marked as read.', 'status' => 'ok', 200]);
    }
}
