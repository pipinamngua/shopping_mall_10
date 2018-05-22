<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class checkAccessProfile
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
            Session::flash('fail', trans('custom.middleware.profile'));
            return redirect()->route('indexHome');
        }
        
        return $next($request);
    }
}
