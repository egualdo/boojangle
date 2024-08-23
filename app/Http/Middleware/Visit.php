<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Visit
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
            // dd("visit");
            if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2){
                return $next($request);
            }else{

                return redirect()->route("welcome");//(RouteServiceProvider::HOME);
            }
                // dd("dentro del visit",$next);
            
          
    }
}
