<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'Admin' && Auth::user()->role_id != '1') {
            abort(401);
        }
        if ($role == 'Pemilik' && Auth::user()->role_id != '2') {
            abort(401);
        }
        if ($role == 'Customer' && Auth::user()->role_id != '3') {
            abort(401);
        }
        return $next($request);
    }
}
