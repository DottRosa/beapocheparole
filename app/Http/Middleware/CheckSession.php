<?php

namespace App\Http\Middleware;

use Closure;

class CheckSession{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $user = null;

        var_dump($request->session()->get('user'));
        return redirect('admin/');
    }
}
