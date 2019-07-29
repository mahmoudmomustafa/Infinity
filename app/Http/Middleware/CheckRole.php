<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRole
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
        if (Auth::check()) {
            if (Auth::user()->isAdmin() || Auth::user()->isEditor()) {
                return $next($request);
            }
        }
        return redirect('/dashboard')->with('message','Not allowed , You are Not Admin or editor');
    }
}
