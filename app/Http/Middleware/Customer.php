<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Customer
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

        if (!Auth::check()){

            return redirect()->route('login');
        }

        if(Auth::user()->role === 'customer' && ( Auth::user()->active === 0 || Auth::user()->trashed())){//isset(Auth::user()->deleted_at))){
            Auth::logout();
            return redirect()->route('login')->withErrors('Your account was blocked');
        }


        return $next($request);
    }
}
