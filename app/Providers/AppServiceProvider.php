<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Inertia::share('auth', function () {
            $user = Auth::user();
    
            if (!$user) return ['user' => null];
    
            // Eager-load the relationship if needed
            $user->load(match ($user->role) {
                'student' => 'student',
                'alumni' => 'alumni',
                'admin' => 'admin',
                default => [],
            });
    
            return [
                'user' => $user,
            ];
        });
    }
}
