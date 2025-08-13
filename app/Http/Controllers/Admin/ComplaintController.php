<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $complaints = Complaint::with('user')->latest()->get();
        return inertia('dashboard/admin/complaints/Index', compact('complaints', 'role'))->rootView('dashboard');
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,resolved',
        ]);

        $complaint->update(['status' => $validated['status']]);

        return back()->with('success', 'Complaint status updated.');
    }
}
