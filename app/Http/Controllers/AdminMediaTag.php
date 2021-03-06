<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\MediaTags;
use App\Utils\Logs;

class AdminMediaTag extends Controller{

    const ITEMS_PATH = 'admin/tags';
    const ITEMS_VIEW = 'admin.tags';
    const ITEM_VIEW = 'admin.tag';

    public function __invoke(){
        return view(self::ITEM_VIEW);
    }


    public function get($id){
        if($id !== NULL){
            $item = MediaTags::find($id);
            return view(self::ITEM_VIEW)->with('item',$item);
        }
        return view(self::ITEM_VIEW);
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $params = self::getParams($request);
            $errs = self::verify($params);

            if(count($errs) == 0){
                MediaTags::forceCreate($params);
                Logs::save(Logs::ACTION_CREATE, "Creazione di un tag ".$params['name'], Session::get('admin')->id);
            } else {
                return view(self::ITEMS_VIEW)->with('errs', $errs);
            }
        }
        return redirect(self::ITEMS_PATH);
    }


    public function update(Request $request, $id){
        if($request->isMethod('post')){
            $params = self::getParams($request);
            $errs = self::verify($params);

            if(count($errs) == 0){
                MediaTags::whereId($id)->update($params);
                Logs::save(Logs::ACTION_UPDATE, "Modifica di un tag con id: ".$id, Session::get('admin')->id);
            } else {
                return view(self::ITEM_VIEW)->width('errs', $errs);
            }
        }
        return redirect(self::ITEMS_PATH);
    }

    public function delete(Request $request, $id){
        MediaTags::whereId($id)->delete();
        Logs::save(Logs::ACTION_DELETE, "Eliminazione di un tag con id: ".$id, Session::get('admin')->id);
        return redirect(self::ITEMS_PATH);
    }



    private function getParams(Request $request){
        $params = array(
            'name' => $request['name']
        );

        return $params;
    }

    private function verify($params){
        $errs = array();

        if($params['name'] == NULL || trim($params['name']) == ''){
            $errs['name'] = 'Devi inserire un nome';
        }

        return $errs;
    }
}
