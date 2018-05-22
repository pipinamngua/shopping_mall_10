<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

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
            Session::flash('fail', trans('custom.middleware.loginAdmin'));
            return redirect()->route('indexHome');
        } elseif (Auth::check() && Auth::user()->role_id != 1) {
            Session::flash('fail', trans('custom.middleware.admin'));
            return redirect()->route('indexHome');
        }

        return $next($request);
    }
}
