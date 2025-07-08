<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Alumni;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class AlumniAuthController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render('Alumni/Login');
    }

    public function showRegisterForm()
    {
        return Inertia::render('Alumni/Register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'matric_number' => 'required|string|max:50|unique:students,matric_number',
            'department' => 'required|string|max:255',
            'graduation_year' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        
        Alumni::create([
            'user_id' => $user->id,
            'graduation_year' => $request->graduation_year,
            'department' => $request->department,
        ]);

        Auth::login($user);
        return redirect()->route('alumni.account');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('alumni.account');
        }

        return back()->withErrors([
            'email' => 'Invalid login details.',
        ])->onlyInput('email');
    }
}

