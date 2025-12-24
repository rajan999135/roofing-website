<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Not logged in → send to login
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        // Logged in but NOT admin → block access
        if (! auth()->user()->is_admin) {
            // Option 1: just forbid
            // abort(403, 'Unauthorized.');

            // Option 2: send them to home with error message
            return redirect()
                ->route('home')
                ->with('error', 'You are not allowed to access the admin area.');
        }

        return $next($request);
    }
}
