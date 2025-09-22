<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;

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
            'description' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120', // max 5MB
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $userId = Auth::id();
            $attachmentPath = $request->file('attachment')->store("complaints/{$userId}", 'public');
        }

        $cleanDescription = Purifier::clean($validated['description']);

        Complaint::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $cleanDescription,
            'attachment' => $attachmentPath,
            'status' => 'Pending',
        ]);
        return redirect()->route('student.complaints.index')->with('success', 'Complaint submitted successfully.');
    }
}
