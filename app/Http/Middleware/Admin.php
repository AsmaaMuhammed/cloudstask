<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $destinations = config('custom.roles_destinations');

        if (Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role != 'admin') {
            return redirect()->route($destinations[\Auth::user()->role]);
        }

        return $next($request);
    }
}
