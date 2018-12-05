<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {


        // check if the user is logged in
        if ($request->user()) {

            // check if the user has a role and the guard role is the same
            if ($request->user()->role === $guard) {
                return $next($request);
            }

            abort(403, 'You do not have permission to access page.');
        }

    }
}
