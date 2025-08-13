<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Services\MenuService;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user && $user instanceof \Illuminate\Database\Eloquent\Model) {
            // Eager-load related model based on role
            $user->load([
                match ($user->role) {
                    'student' => 'student',
                    'alumni'  => 'alumni',
                    'admin'   => 'admin',
                    default   => []
                }
            ]);
        }

        return Inertia::render('dashboard/Home', [
            'user' => $user,
        ])->rootView('dashboard');
    }
}
