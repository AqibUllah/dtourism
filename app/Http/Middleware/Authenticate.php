<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard): Response
    {

//        foreach ($guard as $guard) {
            if (Auth::guard($guard)->check()) {
                return $next($request);
            }
//        }

        // If none of the guards allow access, redirect to login page
//        return dd($guard);
        switch ($guard){
            case 'admin' :
                return redirect()->route('admin.login');
                break;
            case 'customer' :
                return redirect()->route('customer.login');

        }

    }
}
