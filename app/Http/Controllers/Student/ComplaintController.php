<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::withTrashed()
            ->where('user_id', Auth::id())
            ->withCount(['responses as responses_count' => function ($query) {
                $query->where('visible_to_student', true);
            }])
            ->latest()
            ->get();

        return inertia('dashboard/student/complaints/Index', [
            'complaints' => $complaints,
        ])->rootView('dashboard');
    }

    public function show(Complaint $complaint)
    {
        $complaint->load([
            'student.user',
            'student.course',
            'responses' => function ($query) {
                $query->where('visible_to_student', true)
                    ->with('admin.user') // so student sees who responded
                    ->latest();
            },
        ]);

        return inertia('dashboard/student/complaints/Show', [
            'complaint' => $complaint
        ])->rootView('dashboard');
    }


    public function create()
    {
        return inertia('dashboard/student/complaints/Create')->rootView('dashboard');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Complaint::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'body' => $validated['body'],
        ]);

        return back()->with('success', 'Complaint submitted successfully.');
    }
}
