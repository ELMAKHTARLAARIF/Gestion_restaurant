<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!auth()->check()) {

    //         // If request expects JSON (API)
    //         if ($request->expectsJson()) {
    //             return response()->json(['message' => 'Unauthenticated'], 401);
    //         }

    //         // Redirect for web
    //         return redirect('/login');
    //     }

    //     return $next($request);
    // }
}