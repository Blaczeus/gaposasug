<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/events/{slug}', [PageController::class, 'eventDetails'])->name('events.details');
Route::get('/blog/{slug}', [PageController::class, 'blogDetails'])->name('blog.details');
Route::get('/student-voice', [PageController::class, 'studentVoice'])->name('studentVoice');

// Alumni
Route::prefix('alumni')->group(function () {
    Route::get('/benefits', fn () => Inertia::render('alumni/AlumniBenefits'))->name('alumni.benefits');
    Route::get('/graduate-support', fn() => Inertia::render('alumni/GraduateSupport'))->name('alumni.support');
    Route::get('/networking-events', fn() => Inertia::render('alumni/NetworkingEvents'))->name('alumni.events');
    Route::get('/recent-graduates', fn() => Inertia::render('alumni/RecentGraduates'))->name('alumni.recent');
    Route::get('/mentorship', fn() => Inertia::render('alumni/Mentorship'))->name('alumni.mentorship');
    Route::get('/account', fn() => Inertia::render('alumni/AlumniAccount'))->name('alumni.account');
});

// Support
Route::prefix('support')->group(function () {
    Route::get('/housing', fn () => Inertia::render('Support/HousingIssue'))->name('support.housing');
    Route::get('/academic', fn() => Inertia::render('Support/Academic'))->name('support.academic');
    Route::get('/report', fn() => Inertia::render('Support/Report'))->name('support.report');
});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
