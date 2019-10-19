<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}


// if ($this->auth->guest()) {
//     if ($request->ajax()) {
//         return response('Unauthorized.', 401);
//     } else {
//         return redirect()->guest('auth/login');
//     }
// }

// return $next($request);
