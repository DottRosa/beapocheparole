<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ImagesCategories;

class AdminImagesCategory extends Controller{

    const ITEMS_PATH = 'admin/images/categories';
    const ITEMS_VIEW = 'admin.images_categories';
    const ITEM_VIEW = 'admin.images_category';

    public function __invoke(){
        return view(self::ITEM_VIEW);
    }


    public function get($id){
        if($id !== NULL){
            $item = ImagesCategories::find($id);
            return view(self::ITEM_VIEW)->with('item',$item);
        }
        return view(self::ITEM_VIEW);
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $params = self::getParams($request);
            $errs = self::verify($params);

            if(count($errs) == 0){
                ImagesCategories::forceCreate($params);
                Logs::save(Logs::ACTION_CREATE, "Creazione della categoria ".$params['name'], Session::get('admin')->id);
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
                ImagesCategories::whereId($id)->update($params);
                Logs::save(Logs::ACTION_UPDATE, "Modifica della categoria con id: ".$id, Session::get('admin')->id);
            } else {
                return view(self::ITEM_VIEW)->width('errs', $errs);
            }
        }
        return redirect(self::ITEMS_PATH);
    }

    public function delete(Request $request, $id){
        ImagesCategories::whereId($id)->delete();
        Logs::save(Logs::ACTION_DELETE, "Eliminazione della categoria con id: ".$id, Session::get('admin')->id);
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
