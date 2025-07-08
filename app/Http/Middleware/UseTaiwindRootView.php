<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class UseTailwindRootView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $component = $request->route()?->defaults['page'] ?? '';

        $useTailwind = str_starts_with($component, 'auth/') 
            || str_starts_with($component, 'settings/') 
            || $component == 'Dashboard' 
            || $component == 'Welcome';

        if ($useTailwind) {
            Inertia::setRootView('tailwind');
        }

        return $next($request);
    }
}
