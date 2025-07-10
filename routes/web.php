<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AlumniAuthController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/events/{slug}', [PageController::class, 'eventDetails'])->name('events.details');
Route::get('/blog/{slug}', [PageController::class, 'blogDetails'])->name('blog.details');
Route::get('/student-voice', [PageController::class, 'studentVoice'])->name('studentVoice');

// Alumni
Route::prefix('alumni')->name('alumni.')->group(function () {
    Route::get('/benefits', fn () => Inertia::render('alumni/AlumniBenefits')->rootView('template'))->name('benefits');
    Route::get('/graduate-support', fn () => Inertia::render('alumni/GraduateSupport')->rootView('template'))->name('support');
    Route::get('/networking-events', fn () => Inertia::render('alumni/NetworkingEvents')->rootView('template'))->name('events');
    Route::get('/recent-graduates', fn () => Inertia::render('alumni/RecentGraduates')->rootView('template'))->name('recent');
    Route::get('/mentorship', fn () => Inertia::render('alumni/Mentorship')->rootView('template'))->name('mentorship');
    Route::get('/account', fn () => Inertia::render('alumni/AlumniAccount')->rootView('template'))->middleware('auth')->name('account');

    Route::name('auth.')->middleware(['guest', 'use-template-root'])->group(function () {
        Route::get('/login', [AlumniAuthController::class, 'showLoginForm'])->name('login');
        Route::get('/register', [AlumniAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/login', [AlumniAuthController::class, 'login']);
        Route::post('/register', [AlumniAuthController::class, 'register']);
    });
});


// Support
Route::prefix('support')->group(function () {
    Route::get('/housing', fn () => Inertia::render('Support/HousingIssue')->rootView('template'))->name('support.housing');
    Route::get('/academic', fn () => Inertia::render('Support/Academic')->rootView('template'))->name('support.academic');
    Route::get('/report', fn () => Inertia::render('Support/Report')->rootView('template'))->name('support.report');
});

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth', 'verified')->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
