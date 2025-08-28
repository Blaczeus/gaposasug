<?php

use App\Http\Controllers\Admin\ComplaintController as AdminComplaintController;
use App\Http\Controllers\ComplaintResponseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Student\ComplaintController as StudentComplaintController;
use App\Http\Controllers\Alumni\DirectoryController;
use App\Http\Controllers\Alumni\EventController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Public Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/events/{slug}', [PageController::class, 'eventDetails'])->name('events.details');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogDetails'])->name('blog.details');
Route::get('/student-voice', [PageController::class, 'studentVoice'])->name('studentVoice');

// Alumni (Public)
Route::prefix('alumni')->name('alumni.')->group(function () {
    Route::get('/benefits', fn() => Inertia::render('alumni/AlumniBenefits')->rootView('template'))->name('benefits');
    Route::get('/graduate-support', fn() => Inertia::render('alumni/GraduateSupport')->rootView('template'))->name('support');
    Route::get('/networking-events', fn() => Inertia::render('alumni/NetworkingEvents')->rootView('template'))->name('events');
    Route::get('/recent-graduates', fn() => Inertia::render('alumni/RecentGraduates')->rootView('template'))->name('recent');
    Route::get('/mentorship', fn() => Inertia::render('alumni/Mentorship')->rootView('template'))->name('mentorship');
    Route::get('/account', fn() => Inertia::render('alumni/AlumniAccount')->rootView('template'))->middleware('auth')->name('account');
});

// Support (Public)
Route::prefix('support')->group(function () {
    Route::get('/housing', fn() => Inertia::render('support/HousingIssue')->rootView('template'))->name('support.housing');
    Route::get('/academic', fn() => Inertia::render('support/Academic')->rootView('template'))->name('support.academic');
    Route::get('/report', fn() => Inertia::render('support/Report')->rootView('template'))->name('support.report');
});

// General Dashboard (shared entry point for all roles)
Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware('auth', 'verified')
    ->name('dashboard');

// Student-only routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/complaints', [StudentComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/complaints/create', [StudentComplaintController::class, 'create'])->name('complaints.create');
    Route::post('/complaints', [StudentComplaintController::class, 'store'])->name('complaints.store');

    Route::get('/complaints/{complaint}', [StudentComplaintController::class, 'show'])->name('complaints.show');
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Students
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

    // Complaints (Archived) → static routes must come BEFORE dynamic ones
    Route::get('/complaints/archived', [AdminComplaintController::class, 'archived'])->name('complaints.archived');
    Route::get('/complaints/archived/{id}', [AdminComplaintController::class, 'archivedDetails'])->name('complaints.archived.show');
    Route::patch('/complaints/{id}/restore', [AdminComplaintController::class, 'restore'])->name('complaints.restore');
    Route::post('/complaints/bulk-archive', [AdminComplaintController::class, 'bulkArchive'])->name('complaints.bulk-archive');
    Route::post('/complaints/bulk-restore', [AdminComplaintController::class, 'bulkRestore'])->name('complaints.bulk-restore');


    // Complaints (Active)
    Route::get('/complaints', [AdminComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/complaints/{complaint}', [AdminComplaintController::class, 'show'])->name('complaints.show');
    Route::put('/complaints/{complaint}/status', [AdminComplaintController::class, 'updateStatus'])->name('complaints.status.update');
    Route::post('/complaints/{complaint}/response', [ComplaintResponseController::class, 'store'])->name('complaints.response.store');
    Route::delete('/complaints/{complaint}', [AdminComplaintController::class, 'destroy'])->name('complaints.destroy');
});


Route::get('/test-table', function () {
    $complaints = [
        ['id' => 1, 'title' => 'Late Lecturer', 'status' => 'Pending'],
        ['id' => 2, 'title' => 'No Power in Hostel', 'status' => 'Resolved'],
        ['id' => 3, 'title' => 'WiFi Not Working', 'status' => 'Pending'],
    ];

    return Inertia::render('Test/TableDemo', [
        'complaints' => $complaints,
    ]);
});

// API for course search
Route::get('_dataxnr/course-search', function (Request $request) {
    if (!$request->ajax()) {
        abort(403, 'Unauthorized access.');
    }

    $q = $request->input('q');

    return Course::query()
        ->when(
            $q,
            fn($query) =>
            $query->where('name', 'like', "%{$q}%")
                ->orWhere('code', 'like', "%{$q}%")
        )
        ->limit(10)
        ->get(['id', 'name', 'code']);
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
