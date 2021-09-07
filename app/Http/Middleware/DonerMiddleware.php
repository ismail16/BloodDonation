<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DonerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role->id == 2) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
