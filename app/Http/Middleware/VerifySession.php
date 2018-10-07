<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class VerifySession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Session::get('admin') === NULL){
            if(Cookie::get('bpp_admin') === NULL){
                return redirect()->route('login');
            } else {
                Session::put('admin', json_decode(Cookie::get('bpp_admin')));
            }
        }
        return $next($request);
    }
}
