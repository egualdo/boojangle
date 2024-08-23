<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next,...$guards)
    {
       $user=User::where('email',$request->email)->first();

        if($user != null){
            if($user->role_id !== 1 && $user->role_id !== 2){
                // dd("ely");
                $guards = empty($guards) ? [null]:$guards;
                foreach ($guards as  $guard) {
                    if(Auth::guard($guard)->check()){
                        return redirect(RouteServiceProvider::HOME);
                    }
                }
                return $next($request);
            }else{
                // dd("raffa");
                $guards = empty($guards) ? [null]:$guards;
                foreach ($guards as  $guard) {
                    if(Auth::guard($guard)->check()){
                        
                        return redirect(RouteServiceProvider::HOME);
                    }
                }
                return $next($request);
            }
        }
        else{
            // dd("ninguno");
            return $next($request);
        }

    }
       
    
}
