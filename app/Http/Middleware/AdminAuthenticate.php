<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $auth = Auth::guard($guard);

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        if ( Auth::user()->role !== 'admin') {
            if(Auth::user()->role !== 'editor') {
                if (Auth::user()->role !== 'author') {
                    if (Auth::user()->role !== 'moderator') {
                        return response('Access denied.', 401);
                    }
                }
            }
        }


        return $next($request);
    }
}
