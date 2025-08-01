<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user', 'course')->latest()->get();

        return Inertia::render('dashboard/students/Index', [
            'students' => $students,
        ])->rootview('dashboard');
    }

    public function show($matric_no)
    {
        $student = Student::with('user', 'course')->where('matric_no', $matric_no)->firstOrFail();

        return Inertia::render('dashboard/students/Show', [
            'student' => $student,
        ])->rootview('dashboard');
    }
}
