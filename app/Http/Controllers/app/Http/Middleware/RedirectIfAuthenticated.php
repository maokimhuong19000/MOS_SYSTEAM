<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    /*public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/admin/dashboard');
        }

        return $next($request);



    }*/


    public function handle($request, Closure $next, $guard = null)
    {
          switch ($guard) {
          case 'web':
            if (Auth::guard($guard)->check()) {
              return redirect()->route('dashboard');
            }
            break;
          case 'customer':
            if (Auth::guard($guard)->check()) {
              return redirect()->route('front.profile');
            }
            break;
          default:
            if (Auth::guard($guard)->check()) {
                return redirect('dashboard');
            }
            break;
        }
        return $next($request);
    }
}
