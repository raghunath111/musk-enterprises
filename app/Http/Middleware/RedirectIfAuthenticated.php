<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard($guards)->check()) {

            if(Auth::user()->role=='manager'){
                return redirect()->route('manager.index');
             }
             else{
                 if(Auth::user()->role=='client'){
                     return redirect()->route('client.index');
                  }
             }
             
                if(Auth::user()->role=='inspector'){
                    return redirect()->route('inspector.index');
                 }

                 if(Auth::user()->role=='admin'){
                    return redirect()->route('admin.index');
                 }
            
                 else{
                    if(Auth::user()->role=='supervisor'){
                        return redirect()->route('supervisor.index');
                     }
                }
        }

        return $next($request);
    }
}
