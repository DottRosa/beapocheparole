<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminLogin extends Controller{

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $query = DB::table('USERS')
                ->where('username', $username);
        $user = $query->first();
        if($user !== NULL && Hash::check($password, $user->password)){
            Session::put('admin', $user);
            //Cookie::queue("bpp_admin", json_encode(Session::get("admin")), 2592000);
            return redirect('admin/')->with('user',$user);
        }
        return view('login')->with('error', true);
    }

    public function logout(){
        Session::forget('admin');
        return view('admin.login');
    }
}
