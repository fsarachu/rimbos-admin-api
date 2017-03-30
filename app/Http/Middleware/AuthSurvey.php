<?php

namespace App\Http\Middleware;

use Closure;

class AuthSurvey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if user was authenticated with the required event id
        if (!$request->session()->has('rimbos_event')) {
            abort(403);
        }

        return $next($request);
    }
}
