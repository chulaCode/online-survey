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
    public function handle($request, Closure $next, $guard = null)
    {
        switch($guard){
            case 'director':
               if (Auth::guard($guard)->check()) {
                  return redirect('Director/director');
               }
            break;
            case 'chair':
               if (Auth::guard($guard)->check()) {
                  return redirect()->route('chair.show');
               }
            break;
            case 'instructor':
                if (Auth::guard($guard)->check()) {
                   return redirect()->route('instructor.show');
                 }
            default:
                if (Auth::guard($guard)->check()) {
                   return redirect('/home');
                }
            break;
        }

        return $next($request);
    }
}
