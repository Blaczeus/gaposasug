<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user && $user instanceof \Illuminate\Database\Eloquent\Model) {
            $user->load([
                match ($user->role) {
                    'student' => 'student',
                    'alumni' => 'alumni',
                    'admin' => 'admin',
                }
            ]);
        }

        return Inertia::render('Dashboard', [
            'user' => $user
        ]);
    }
}
