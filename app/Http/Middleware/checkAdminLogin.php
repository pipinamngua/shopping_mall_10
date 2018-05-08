<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkAdminLogin
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
        if (!Auth::check()) {
            return redirect()->route('login');
        } else (Auth::check() && Auth::user()->role_id != 1) {
            die(trans('custom.login_admin.fail'));
        }

        return $next($request);
    }
}
