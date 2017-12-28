<?php

namespace Basevendor\User\Http\Middleware;

use Closure;

/**
 * Class GuestUser
 * @package Basevendor\User\Http\Middleware
 */
class GuestUser
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
        view()->share('signedIn',auth()->check());
        view()->share('user', auth()->user() ?: new \Basevendor\User\GuestUser);
        return $next($request);
    }
}