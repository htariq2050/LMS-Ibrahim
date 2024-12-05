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
        if (!Auth::check()) return redirect('/'); 
        
        $user = Auth::user();

        if ($user) $request->merge(['user_id' => $user->id]);
        
        if ($user->role !== $role)   return redirect('/'); 
        

        return $next($request);
    }
}
