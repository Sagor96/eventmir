<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
  public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "sprovider" && Auth::guard($guard)->check()) {
            return redirect('/sprovider');
        }
        if ($guard == "clientlog" && Auth::guard($guard)->check()) {
            return redirect('/clientlog');
        }
        if ($guard == "stafflog" && Auth::guard($guard)->check()) {
            return redirect('/stafflog');
        }

        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
