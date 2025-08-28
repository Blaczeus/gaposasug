<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; //
// use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{

    use AuthorizesRequests;

    public function index()
    {
        $complaints = Complaint::with([
            'student.user',
        ])->withCount('responses')
        ->latest()
        ->get();

        return inertia('dashboard/admin/complaints/Index', compact('complaints'))
            ->rootView('dashboard');
    }


    public function show(Complaint $complaint)
    {
        $complaint->load([
            'user',
            'student.course',
            'responses.admin.user', // eager load responses + admin + their user profile
        ]);

        return inertia('dashboard/admin/complaints/Show', [
            'complaint' => $complaint,
        ])->rootView('dashboard');
    }


    public function archived()
    {
        $complaints = Complaint::onlyTrashed()
            ->with('student.user')
            ->latest()
            ->get();

        return inertia('dashboard/admin/complaints/archives/Index', [
            'complaints' => $complaints
        ])->rootView('dashboard');
    }

    public function archivedDetails($id)
    {
        $complaint = Complaint::onlyTrashed()
            ->with('user', 'student.course')
            ->findOrFail($id);

        return inertia('dashboard/admin/complaints/archives/Show', [
            'complaint' => $complaint
        ])->rootView('dashboard');
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $this->authorize('update', $complaint);

        $validated = $request->validate([
            'status' => ['required', Rule::in(['pending', 'in_progress', 'resolved'])],
        ]);

        $allowedTransitions = [
            'pending'     => ['in_progress'],
            'in_progress' => ['resolved'],
            'resolved'    => [], // final
        ];

        $current = $complaint->status;
        $next    = $validated['status'];

        if (!in_array($next, $allowedTransitions[$current] ?? [], true)) {
            return back()->withErrors(['status' => 'Invalid status change.']);
        }

        $complaint->update(['status' => $next]);

        return back()->with('success', 'Complaint status updated.');
    }

    // (Optional) Restore endpoint
    public function restore($id)
    {
        $complaint = Complaint::withTrashed()->findOrFail($id);

        $this->authorize('restore', $complaint);

        // Bring it back
        $complaint->restore();

        // Re-open so it’s actionable again
        if ($complaint->status === 'resolved') {
            $complaint->update(['status' => 'in_progress']);
        }

        // Redirect to active show (no more 404 on archived show)
        return redirect()
            ->route('admin.complaints.show', $complaint->id)
            ->with('success', 'Complaint restored and set to In Review.');
    }

    public function bulkArchive(Request $request)
    {
        $ids = $request->input('ids', []);
        Complaint::whereIn('id', $ids)->delete();

        return back()->with('success', 'Selected complaints archived.');
    }

    public function bulkRestore(Request $request)
    {
        $ids = $request->input('ids', []);
        Complaint::withTrashed()->whereIn('id', $ids)->restore();

        return back()->with('success', 'Selected complaints restored.');
    }

    public function destroy(Complaint $complaint)
    {
        $this->authorize('delete', $complaint);

        if ($complaint->status !== 'resolved') {
            return back()->withErrors(['archive' => 'Only resolved complaints can be archived.']);
        }

        $complaint->delete(); // Soft delete

        return redirect()
            ->route('admin.complaints.index')
            ->with('success', 'Complaint archived.');
    }
}
