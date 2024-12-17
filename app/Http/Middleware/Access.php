<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Example logic: check if 'age' parameter is >= 18
        if (Auth::user()->email != 'horizontamil@gmail.com') {
            return redirect('dashboard')->with('error', 'You are not access this page.');
        }

        return $next($request);
    }
}
