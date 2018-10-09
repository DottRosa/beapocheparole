<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Gallery;

class AdminGallery extends Controller{

    const ITEMS_PATH = 'admin/galleries/list';
    const ITEMS_VIEW = 'admin.galleries';
    const ITEM_VIEW = 'admin.gallery';

    public function __invoke(){
        return view(self::ITEM_VIEW);
    }

    public function get($id){
        if($id !== NULL){
            $item = Gallery::find($id);
            return view(self::ITEM_VIEW)->with('item',$item);
        }
        return view(self::ITEM_VIEW);
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $params = self::getParams($request);
            $errs = self::verify($params);

            if(count($errs) == 0){
                $params['password'] = Hash::make($params['password']);
                Gallery::forceCreate($params);
            } else {
                return view(self::ITEMS_VIEW)->with('errs', $errs);
            }
        }
        return redirect(self::ITEMS_PATH);
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

            Gallery::whereId($id)->update($params);
            return view(self::ITEMS_VIEW);
        }
        return redirect(self::ITEMS_PATH);
    }

    public function delete(Request $request, $id){
        Gallery::whereId($id)->delete();
        return redirect('admin/Gallery');
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
