<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use App\Users;
use App\Media;
use App\Utils\Logs;

class AdminLogin extends Controller{

    public function __invoke(){
        if(Cookie::get('bpp_admin') !== NULL){
            Session::put('admin', json_decode(Cookie::get('bpp_admin')));
            return redirect('admin/dashboard');
        }

        $image = Media::inRandomOrder()->where('type', '=', 'IMG')->first();
        return view('admin.login')->with('image', $image);
    }

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $query = DB::table('USERS')
                ->where('username', $username);
        $user = $query->first();
        if($user !== NULL && Hash::check($password, $user->password)){
            Session::put('admin', $user);
            Cookie::queue('bpp_admin', json_encode($user), 43200);   //30 giorni
            Logs::save(Logs::ACTION_LOGIN, "L'utente ha effettuato il login", $user->id);
            return redirect('admin/dashboard')->with('user',$user);
        }
        return view('login')->with('error', true);
    }

    public function logout(){
        $user = Session::get('admin');
        Logs::save(Logs::ACTION_LOGOUT, "L'utente ha effettuato il logout", $user->id);
        Session::forget('admin');
        Cookie::queue('bpp_admin', null, -1);
        return redirect('admin/');
    }
}
