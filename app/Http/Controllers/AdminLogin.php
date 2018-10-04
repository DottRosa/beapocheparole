<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Users;
use App\Utils\Logs;

class AdminLogin extends Controller{

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $query = DB::table('USERS')
                ->where('username', $username);
        $user = $query->first();
        if($user !== NULL && Hash::check($password, $user->password)){
            Session::put('admin', $user);
            Logs::save(Logs::ACTION_LOGIN, "L'utente ha effettuato il login", $user->id);
            return redirect('admin/')->with('user',$user);
        }
        return view('login')->with('error', true);
    }

    public function logout(){
        $user = Session::get('admin');
        Logs::save(Logs::ACTION_LOGOUT, "L'utente ha effettuato il logout", $user->id);
        Session::forget('admin');
        return view('admin.login');
    }
}
