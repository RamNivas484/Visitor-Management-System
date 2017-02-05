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
    {if (Auth::guard($guard)->check()) {
        $userType = Auth::user()->whoareu;
        echo $userType;
        if (strcmp($userType,'Administrator')==1) {
           return redirect('/admin');
        } else if ($userType == 'Employee') {
            return redirect('/employee');
        } else if (strcmp($userType == 'Visitor')==1) {
            return redirect('/visitor');
        }
    }

        return $next($request);
    }
}
