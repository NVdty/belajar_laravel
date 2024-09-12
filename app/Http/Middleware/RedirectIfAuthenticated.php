<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

// // class RedirectIfAuthenticated
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next)
//     {
//          // Check if the user is authenticated
//          if (Auth::check()) {
//             // Redirect to home or another route if already authenticated
//             return redirect('/');
//         }
//         return $next($request);
//     }
// }
