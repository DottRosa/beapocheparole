<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Documents;
use App\Utils\Logs;

class AdminDocument extends Controller{

    const ITEMS_PATH = 'admin/documents/list';
    const ITEMS_VIEW = 'admin.documents_list';
    const ITEM_VIEW = 'admin.document';

    public function __invoke(){
        return view(self::ITEM_VIEW);
    }


    public function get($id){
        if($id !== NULL){
            $item = Documents::find($id);
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
                Documents::forceCreate($params);
                Logs::save(Logs::ACTION_CREATE, "Creazione di un testo", Session::get('admin')->id);
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

            Documents::whereId($id)->update($params);
            Logs::save(Logs::ACTION_UPDATE, "Modifica del testo con id: ".$id, Session::get('admin')->id);
            return view(self::ITEMS_VIEW);
        }
        return redirect(self::ITEMS_PATH);
    }

    public function delete(Request $request, $id){
        Documents::whereId($id)->delete();
        Logs::save(Logs::ACTION_DELETE, "Eliminazione del testo con id: ".$id, Session::get('admin')->id);
        return redirect(self::ITEMS_PATH);
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
