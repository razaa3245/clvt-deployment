<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // For web requests use server-side session auth
        if (!Auth::check()) {
            // preserve intended URL and redirect to named login route
            return redirect()->guest(route('login'));
        }

        if (Auth::check()) {
            // preserve intended URL and redirect to named login route
            return redirect()->guest(route('shopkeeper.dashboard'));
        }

        return $next($request);
    }
}
