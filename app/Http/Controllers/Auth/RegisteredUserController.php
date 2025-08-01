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
use Illuminate\Support\Facades\DB;
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
     * Modify user input for phone number.
     */
    private function normalizePhone(string $phone): string
    {
        // Remove spaces and dashes
        $phone = preg_replace('/[\s-]+/', '', $phone);

        // Convert 0-prefixed to +234
        if (preg_match('/^0\d{10}$/', $phone)) {
            return '+234' . substr($phone, 1);
        }

        // If it already starts with +234, return as is
        if (preg_match('/^\+234\d{10}$/', $phone)) {
            return $phone;
        }

        throw ValidationException::withMessages([
            'phone' => 'Invalid phone number format. Use 08123456789 or +2348123456789.',
        ]);
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Normalize the user's phone number to a consistent +234 format before saving
        $normalizedPhone = $this->normalizePhone($request->input('phone'));
        $request->merge(['phone' => $normalizedPhone]);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:15|unique:users,phone',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:student,alumni,admin',
        ], [
            'email.unique' => 'Looks like this email is already linked to an account.',
            'phone.unique' => 'This phone number is already registered. Maybe you already signed up?',
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
                    'matric_no' => 'required|string|unique:students,matric_no',
                    'course_id' => 'required|integer|exists:courses,id',
                    'level' => ['required', Rule::in(array_column(StudentLevel::cases(), 'value'))],
                    'dob' => 'nullable|date',
                    'gender' => 'nullable|in:male,female,other',
                    'address' => 'nullable|string|max:255',
                    'photo' => 'nullable|string|max:255',
                ], [
                    'matric_no.unique' => 'This matric number already exists. Please double-check.',
                ]);
                break;

            case 'alumni':
                $roleFields = $request->validate([
                    'graduation_year' => 'required|digits:4|integer|min:2000|max:' . now()->year,
                    'course_id' => 'required|integer|exists:courses,id',
                ], [
                    'graduation_year.required' => 'Graduation year is required.',
                    'graduation_year.digits' => 'Graduation year must be a 4-digit number.',
                    'graduation_year.max' => 'Graduation year can’t be in the future.',
                    'course_id.required' => 'Please enter your course_id.',
                ]);
                break;

            case 'admin':
                $roleFields = $request->validate([
                    'position' => 'nullable|string|max:100',
                ]);

                if (!str_ends_with(strtolower($request->email), '@gaposa.edu.ng')) {
                    throw ValidationException::withMessages([
                        'email' => 'Only official GAPOSA emails are allowed for admin registration.',
                    ]);
                }
                break;
        }

        DB::beginTransaction();

        try {
            $user = User::create([
                // Format user's name with proper capitalization and trim extra whitespace
                'name' => ucwords(trim($request->name)),
                'email' => strtolower(trim($request->email)),
                'phone' => $normalizedPhone,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
    
            match ($request->role) {
                'student' => Student::create([
                    'user_id' => $user->id,
                    'matric_no' => strtoupper($roleFields['matric_no']), // <-- Ensure uppercase
                    'course_id' => $roleFields['course_id'],
                    'level' => $roleFields['level'],
                    'dob' => $roleFields['dob'] ?? null,
                    'gender' => $roleFields['gender'] ?? null,
                    'address' => isset($roleFields['address']) ? trim($roleFields['address']) : null,
                    'photo' => isset($roleFields['photo']) ? trim($roleFields['photo']) : null,
                ]),
    
    
                'alumni' => Alumni::create([
                    'user_id' => $user->id,
                    'graduation_year' => $roleFields['graduation_year'],
                    'course_id' => $roleFields['course_id'],
                ]),
    
                'admin' => Admin::create([
                    'user_id' => $user->id,
                    'position' => $roleFields['position'] ?? null,
                ]),
            };
    
            event(new Registered($user));
            Auth::login($user);

            DB::commit();
    
            return match ($user->role) {
                'student' => redirect()->route('dashboard'),
                'alumni' => redirect()->route('dashboard'),
                'admin' => redirect()->route('admin.dashboard'),
                default => redirect()->route('login'),
            };
        }
        catch (\Throwable $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' => 'Registration failed. ' . $e->getMessage(),
            ]);
        }
    }
}
