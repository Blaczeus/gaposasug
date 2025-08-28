<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Admin;
use App\Models\ComplaintResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintResponseController extends Controller
{
    /**
     * Store a newly created response for a complaint.
     */
    public function store(Request $request, Complaint $complaint)
    {
        $request->validate([
            'response' => 'required|string',
            'visible_to_student' => 'boolean',
        ]);

        $admin = Admin::where('user_id', auth()->id())->firstOrFail();

        $complaint->responses()->create([
            'admin_id' => $admin->id, 
            'response' => $request->response,
            'visible_to_student' => $request->boolean('visible_to_student', true),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Response added successfully.');
    }
}
