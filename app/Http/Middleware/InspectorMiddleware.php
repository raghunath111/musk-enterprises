<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspectorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role=='inspector'){

            return $next($request);
        }
        if(Auth::user()->role=='admin'){

            return $next($request);
        }
        if(Auth::user()->role=='supervisor'){

            return $next($request);
        }
        else{
            return redirect('/')->with('status', 'You are not allowed. Go back');
        }
    }
}
