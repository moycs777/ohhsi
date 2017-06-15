<?php

namespace App\Http\Middleware;

use Closure;
use Session;
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
    public function handle($request, Closure $next, $guard = null)
    {
      switch ($guard) {
        case 'cliente':
          
          if (Auth::guard($guard)->check()) {
            //dd($guard);
            return redirect()->route('inicio');
          }
          break;

        default:
          if (Auth::guard($guard)->check()) {
              //dd($guard);
              return redirect('/admin');
          }
          break;
      }

      return $next($request);
    }
}
