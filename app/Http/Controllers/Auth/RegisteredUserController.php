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
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
// use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Admin;
use App\Models\Alumni;
use App\Models\Student;
use App\Enums\StudentLevel;

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
            'phone' => 'required|string|max:15|unique:users,phone',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:student,alumni,admin',
        ]);

        $roleFields = [];

        switch ($request->role) {
            case 'student':
                $levelInput = strtoupper(trim(str_replace(' ', '', $request->level))); // "ND1"

                $levelMap = [
                    'ND1' => 'ND 1',
                    'ND2' => 'ND 2',
                    'HND1' => 'HND 1',
                    'HND2' => 'HND 2',
                ];

                $request->merge([
                    'level' => $levelMap[$levelInput] ?? $request->level,
                ]);
                
                $roleFields = $request->validate([
                    'matric_number' => 'required|string|unique:students,matric_number',
                    'department' => 'required|string|max:100',
                    'level' => ['required', Rule::in(array_column(StudentLevel::cases(), 'value'))],
                ]);
                break;

            case 'alumni':
                $roleFields = $request->validate([
                    'graduation_year' => 'required|digits:4|integer|min:2000|max:' . now()->year,
                    'department' => 'required|string|max:100',
                ]);
                break;

            case 'admin':
                $roleFields = $request->validate([
                    'position' => 'nullable|string|max:100',
                ]);

                if (!str_ends_with(strtolower($request->email), '@gaposa.edu.ng')) {
                    throw ValidationException::withMessages([
                        'email' => 'Only admins are allowed.',
                    ]);
                }
                break;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        match ($request->role) {
            'student' => Student::create([
                'user_id' => $user->id,
                'matric_number' => $roleFields['matric_number'],
                'department' => $roleFields['department'],
                'level' => $roleFields['level'],
            ]),

            'alumni' => Alumni::create([
                'user_id' => $user->id,
                'graduation_year' => $roleFields['graduation_year'],
                'department' => $roleFields['department'],
            ]),

            'admin' => Admin::create([
                'user_id' => $user->id,
                'position' => $roleFields['position'] ?? null,
            ]),
        };

        event(new Registered($user));
        Auth::login($user);

        return match ($user->role) {
            default => redirect()->route('dashboard'),
        };
    }


}
