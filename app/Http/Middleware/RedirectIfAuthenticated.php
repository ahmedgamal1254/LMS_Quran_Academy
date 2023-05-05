<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && $guard == 'admin') {
            return redirect("dashboard");
        }

        if (Auth::guard($guard)->check() && $guard == 'partent') {
            return redirect("partent/dashboard");
        }
        
        if (Auth::guard($guard)->check() && $guard == 'teacher') {
            return redirect("teacher");
        }
        
        if (Auth::guard($guard)->check()) {
            return redirect("/");
        }
        return $next($request);
    }
}
