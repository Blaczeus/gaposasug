<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        // Paginate and order by pinned and created_at
        $notices = Notice::orderByDesc('pinned')
            ->orderByDesc('created_at')
            ->paginate(10);

        return Inertia::render('dashboard/admin/notices/Index', [
            'notices' => $notices
        ])->rootView('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('dashboard/admin/notices/Create')->rootView('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',

            'audience' => 'required|string|in:all,students,admins,alumni,courses,departments',

            // Pivot targets
            'course_ids' => 'nullable|array',
            'course_ids.*' => 'integer|exists:courses,id',
            'department_ids' => 'nullable|array',
            'department_ids.*' => 'integer|exists:departments,id',

            'pinned' => 'boolean',
            'important' => 'boolean',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',

            'attachments' => 'nullable|array',
        ]);

        // Attach the logged-in admin
        $data['admin_id'] = auth()->user()->admin?->id ?? null;

        // Create the notice without attachments first
        $notice = Notice::create(Arr::except($data, ['attachments']));

        // Handle attachments if uploaded
        if ($request->hasFile('attachments')) {
            $stored = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store("notices/attachments/{$notice->id}", 'public');

                $stored[] = [
                    'filename' => $file->getClientOriginalName(),
                    'path' => $path,
                    'mime' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                ];
            }
            $notice->update(['attachments' => $stored]);
        }

        // Sync courses if audience is courses
        if ($request->audience === 'courses' && !empty($data['course_ids'])) {
            $notice->courses()->sync($data['course_ids']);
        }

        // Sync departments if audience is departments
        if ($request->audience === 'departments' && !empty($data['department_ids'])) {
            $notice->departments()->sync($data['department_ids']);
        }

        return redirect()
            ->route('admin.notices.index')
            ->with('success', 'Notice created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        return Inertia::render('dashboard/admin/notices/Show', [
            'notice' => $notice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        return Inertia::render('dashboard/admin/notices/Edit', [
            'notice' => $notice
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',

            'audience' => 'required|string|in:all,students,admins,alumni,courses,departments',

            // Pivot targets
            'course_ids' => 'nullable|array',
            'course_ids.*' => 'integer|exists:courses,id',
            'department_ids' => 'nullable|array',
            'department_ids.*' => 'integer|exists:departments,id',

            'pinned' => 'boolean',
            'important' => 'boolean',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',

            // Attachments
            'attachments' => 'nullable|array',
            'removed_files' => 'nullable|array', // IDs or filenames of files to remove
        ]);

        // Update core fields (skip attachments for now)
        $notice->update(Arr::except($data, ['attachments', 'removed_files']));

        $existing = $notice->attachments ?? [];

        // Remove files if requested
        if ($request->filled('removed_files')) {
            foreach ($data['removed_files'] as $remove) {
                $file = collect($existing)->firstWhere('filename', $remove);

                if ($file) {
                    // delete from storage
                    Storage::disk('public')->delete($file['path']);
                    // remove from array
                    $existing = array_filter($existing, fn($f) => $f['filename'] !== $remove);
                }
            }
        }

        // Handle newly uploaded attachments
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store("notices/attachments/{$notice->id}", 'public');

                $existing[] = [
                    'filename' => $file->getClientOriginalName(),
                    'path' => $path,
                    'mime' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                ];
            }
        }

        // Save updated attachments array
        $notice->update(['attachments' => array_values($existing)]);

        // Sync courses
        if ($request->audience === 'courses' && !empty($data['course_ids'])) {
            $notice->courses()->sync($data['course_ids']);
        } else {
            $notice->courses()->detach();
        }

        // Sync departments
        if ($request->audience === 'departments' && !empty($data['department_ids'])) {
            $notice->departments()->sync($data['department_ids']);
        } else {
            $notice->departments()->detach();
        }

        return redirect()
            ->route('admin.notices.index')
            ->with('success', 'Notice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('admin.notices.index')->with('success', 'Notice deleted successfully.');
    }
}
