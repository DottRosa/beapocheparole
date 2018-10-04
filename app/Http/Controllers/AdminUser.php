<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Users;

class AdminUser extends Controller{

    public function __invoke(){
        return view('admin.user');
    }


    public function get($id){
        if($id !== NULL){
            $item = Users::find($id);
            return view('admin.user')->with('item',$item);
        }
        return view('admin.user');
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $params = self::getParams($request);
            $errs = self::verify($params);

            if(count($errs) == 0){
                $params['password'] = Hash::make($params['password']);
                Users::forceCreate($params);
            } else {
                return view('admin.users')->with('errs', $errs);
            }
        }
        return redirect('admin/users');
    }


    public function update(Request $request, $id){
        if($request->isMethod('post')){
            $params = self::getParams($request);

            if($params['username'] == NULL || trim($params['username']) == ''){
                unset($params['username']);
            }

            if($params['password'] == NULL || trim($params['password']) == ''){
                unset($params['password']);
            } else {
                $params['password'] = Hash::make($params['password']);
            }

            Users::whereId($id)->update($params);
            return view('admin.users');
        }
        return redirect('admin/users');
    }

    public function delete(Request $request, $id){
        Users::whereId($id)->delete();
        return redirect('admin/users');
    }



    private function getParams(Request $request){
        $params = array(
            'username' => $request['username'],
            'password' => $request['password'],
            'permission' => $request['permission'],
        );

        return $params;
    }

    private function verify($params){
        $errs = array();

        if($params['username'] == NULL || trim($params['username']) == ''){
            $errs['username'] = 'Devi inserire lo username';
        }
        if($params['password'] == NULL || trim($params['password']) == ''){
            $errs['password'] = 'Devi inserire una password';
        }

        return $errs;
    }
}
