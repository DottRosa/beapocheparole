<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Media;
use App\MediaTags;
use App\Utils\Logs;

class AdminDocument extends Controller{

    const ITEMS_PATH = 'admin/documents/list';
    const ITEMS_VIEW = 'admin.documents';
    const ITEM_VIEW = 'admin.document';

    public function __invoke(){
        $tags = MediaTags::orderBy('name','ASC')->get();
        return view(self::ITEM_VIEW)->with('tags', $tags);
    }

    public function get($id){
        if($id !== NULL){
            $item = Media::find($id);
            return view(self::ITEM_VIEW)->with('item',$item);
        }
        return view(self::ITEM_VIEW);
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $params = self::getParams($request);
            $errs = self::verify($params);

            if(count($errs) == 0){
                Media::forceCreate($params);
                Logs::save(Logs::ACTION_CREATE, "Creazione del testo", Session::get('admin')->id);
            } else {
                return view(self::ITEMS_VIEW)->with('errs', $errs);
            }
        }
        return redirect(self::ITEMS_PATH);
    }


    public function update(Request $request, $id){
        if($request->isMethod('post')){
            $params = self::getParams($request);

            Media::whereId($id)->update($params);
            Logs::save(Logs::ACTION_UPDATE, "Modifica del testo con id: ".$id, Session::get('admin')->id);
            return view(self::ITEMS_VIEW);
        }
        return redirect(self::ITEMS_PATH);
    }

    public function delete(Request $request, $id){
        Images::whereId($id)->delete();
        Logs::save(Logs::ACTION_DELETE, "Eliminazione del testo con id: ".$id, Session::get('admin')->id);
        return redirect(self::ITEMS_PATH);
    }



    private function getParams(Request $request){
        $params = array(
            'title' => $request['name'],
            'content' => $request['content']
        );

        return $params;
    }

    private function verify($params){
        $errs = array();

        if($params['title'] == NULL || trim($params['title']) == ''){
            $errs['title'] = 'Devi inserire il nome';
        }
        if($params['content'] == NULL || trim($params['content']) == ''){
            $errs['content'] = 'Devi inserire un testo';
        }

        return $errs;
    }
}
