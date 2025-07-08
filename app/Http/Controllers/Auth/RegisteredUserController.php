<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
// use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Admin;
use App\Models\Alumni;
use App\Models\Student;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => 'required|in:student,alumni,admin',
    ]);

    // Role-specific validation
    $roleFields = [];

    switch ($request->role) {
        case 'student':
            $roleFields = $request->validate([
                'matric_number' => 'required|string|unique:students,matric_number',
                'department' => 'required|string|max:100',
                'entry_year' => 'required|digits:4|integer|min:2000|max:' . now()->year,
                'graduation_year' => 'required|digits:4|integer|min:2000|max:' . (now()->year + 10),
            ]);
            break;

        case 'alumni':
            $roleFields = $request->validate([
                'graduation_year' => 'required|digits:4|integer|min:2000|max:' . now()->year,
                'department' => 'required|string|max:100',
                'current_job' => 'nullable|string|max:255',
                'linkedin_profile' => 'nullable|url|max:255',
            ]);
            break;

        case 'admin':
            $roleFields = $request->validate([
                'position' => 'nullable|string|max:100',
            ]);

            // Optionally restrict admin emails to official domain
            if (!str_ends_with($request->email, '@gaposa.edu.ng')) {
                abort(403, 'Unauthorized admin registration');
            }
            break;
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    match ($request->role) {
        'student' => Student::create([
            'user_id' => $user->id,
            'matric_number' => $roleFields['matric_number'],
            'department' => $roleFields['department'],
            'entry_year' => $roleFields['entry_year'],
            'graduation_year' => $roleFields['graduation_year'],
        ]),
    
        'alumni' => Alumni::create([
            'user_id' => $user->id,
            'graduation_year' => $roleFields['graduation_year'],
            'department' => $roleFields['department'],
            'current_job' => $roleFields['current_job'] ?? null,
            'linkedin_profile' => $roleFields['linkedin_profile'] ?? null,
        ]),
    
        'admin' => Admin::create([
            'user_id' => $user->id,
            'position' => $roleFields['position'] ?? null,
        ]),
    };    

    event(new Registered($user));
    Auth::login($user);

    // Redirect the user based on his/her role
    return match ($user->role) {
        'student' => redirect()->route('student.dashboard'),
        'alumni' => redirect()->route('alumni.dashboard'),
        'admin' => redirect()->route('admin.dashboard'),
        default => redirect()->route('dashboard'),
    };
}

}
