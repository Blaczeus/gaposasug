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
        $complaints = Complaint::where('user_id', Auth::id())->latest()->get();
        return inertia('Student/Complaints/Index', compact('complaints'));
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
