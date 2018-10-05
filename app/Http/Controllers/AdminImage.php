<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Images;
use App\ImagesCategories;
use App\Utils\Logs;

class AdminImage extends Controller{

    const ITEMS_PATH = 'admin/images/list';
    const ITEMS_VIEW = 'admin.images';
    const ITEM_VIEW = 'admin.image';

    public function __invoke(){
        $categories = ImagesCategories::orderBy('name','ASC')->get();
        return view(self::ITEM_VIEW)->with('categories', $categories);
    }

    public function get($id){
        if($id !== NULL){
            $item = Images::find($id);
            return view(self::ITEM_VIEW)->with('item',$item);
        }
        return view(self::ITEM_VIEW);
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $params = self::getParams($request);
            $errs = self::verify($params);

            if(count($errs) == 0){
                $path   = $request->file('image');
                $resize = Image::make($path)
                                ->resize(1500, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->encode('jpg');

                $image_name = md5($resize->__toString())."_".time();
                Storage::put('public/assets/images/'.$image_name.'.jpg', $resize->__toString());
                $params['asset'] = 'public/assets/images/'.$image_name.'.jpg';

                Images::forceCreate($params);
                Logs::save(Logs::ACTION_CREATE, "Creazione di un'immagine", Session::get('admin')->id);
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

            Images::whereId($id)->update($params);
            Logs::save(Logs::ACTION_UPDATE, "Modifica dell'immagine con id: ".$id, Session::get('admin')->id);
            return view(self::ITEMS_VIEW);
        }
        return redirect(self::ITEMS_PATH);
    }

    public function delete(Request $request, $id){
        Images::whereId($id)->delete();
        Logs::save(Logs::ACTION_DELETE, "Eliminazione dell'immagine con id: ".$id, Session::get('admin')->id);
        return redirect(self::ITEMS_PATH);
    }



    private function getParams(Request $request){
        $params = array(
            'title' => $request['name'],
            'asset' => $request['image'],
            'category_id' => $request['category_id'],
        );

        return $params;
    }

    private function verify($params){
        $errs = array();

        if($params['title'] == NULL || trim($params['title']) == ''){
            $errs['title'] = 'Devi inserire il nome';
        }
        if($params['asset'] == NULL || trim($params['asset']) == ''){
            $errs['asset'] = 'Devi inserire un\'immagine';
        }
        if($params['category_id'] == NULL || trim($params['category_id']) == ''){
            $errs['category_id'] = 'Devi inserire una categoria';
        }

        return $errs;
    }
}
