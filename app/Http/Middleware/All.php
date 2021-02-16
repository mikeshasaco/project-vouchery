<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class All
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
        if (auth()->guard('customer')->check()||Auth::check()) {
            return $next($request);
        }
        return redirect('/register');
    }
}
