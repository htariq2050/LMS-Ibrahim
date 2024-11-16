<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{

    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/'); // Redirect to home if not logged in
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            return redirect('/'); // Redirect if user does not have the correct role
        }

        return $next($request);
    }
}
