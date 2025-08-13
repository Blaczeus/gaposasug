<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Inertia\Inertia;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user', 'course')->latest()->get();

        return Inertia::render('dashboard/admin/students/Index', [
            'students' => $students,
        ])->rootview('dashboard');
    }

    public function show(Student $student)
    {
        $student->load('user', 'course');
        // $student = Student::with('user', 'course')->where('matric_no', $matric_no)->firstOrFail();

        return Inertia::render('dashboard/admin/students/Show', [
            'student' => $student,
        ])->rootview('dashboard');
    }

    public function update(Request $request, Student $student)
    {
        // Load related user for update
        $student->load('user');

        // Validate incoming data
        $request->validate([
            'email' => ['sometimes', 'required', 'email', Rule::unique('users', 'email')->ignore($student->user->id)],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Male,Female',
            'dob' => 'nullable|date|before_or_equal:today',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            // Prepare update data
            $userData = array_filter($request->only(['email', 'phone']), fn($v) => !is_null($v));
            $studentData = array_filter($request->only(['address', 'gender', 'dob']), fn($v) => !is_null($v));

            // Keep gender/dob locked if already set
            if ($student->gender) unset($studentData['gender']);
            if ($student->dob) unset($studentData['dob']);

            // Add photo if uploaded
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $folder = 'student_photos/' . $student->id;

                if ($student->photo && Storage::disk('public')->exists($student->photo)) {
                    Storage::disk('public')->delete($student->photo);
                }

                $path = $file->storeAs($folder, $filename, 'public');
                $studentData['photo'] = str_replace('public/', '', $path);
            }

            // // Log only changed student fields
            // $student->fill($studentData);
            // if ($student->isDirty()) {
            //     Log::info('Updated student fields:', $student->getDirty());
            // }

            // // Log only changed user fields
            // if (!empty($userData)) {
            //     $student->user->fill($userData);
            //     if ($student->user->isDirty()) {
            //         Log::info('Updated user fields:', $student->user->getDirty());
            //     }
            // }

            // Actually save changes
            if (!empty($userData)) {
                $student->user->update($userData);
            }
            if (!empty($studentData)) {
                $student->update($studentData);
            }

            return back()->with('success', 'Student details updated successfully.');
        } catch (\Exception $e) {
            Log::error('Student update failed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }
}
