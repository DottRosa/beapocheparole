<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Gallery;
use App\Media;
use App\Tags;
use App\RMediaGallery;
use App\Utils\Logs;

class AdminGallery extends Controller{

    const ITEMS_PATH = 'admin/galleries/list';
    const ITEMS_VIEW = 'admin.galleries';
    const ITEM_VIEW = 'admin.gallery';

    public function __invoke(){
        $tags = Tags::orderBy('name','ASC')->get();
        return view(self::ITEM_VIEW)->with('tags', $tags);
    }

    public function get($id){
        $tags = Tags::orderBy('name','ASC')->get();
        if($id !== NULL){
            $item = Gallery::find($id);

            $item['media'] = Media::join('R_MEDIA_GALLERY', 'R_MEDIA_GALLERY.media_id', '=', 'MEDIA.id')
                                  ->where('R_MEDIA_GALLERY.gallery_id', '=', $id)
                                  ->orderBy('R_MEDIA_GALLERY.position', 'ASC')
                                  ->get();

            return view(self::ITEM_VIEW)->with('item',$item)->with('tags', $tags);
        }
        return view(self::ITEM_VIEW);
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $params = self::getParams($request);

            $errs = self::verify($params);

            if(count($errs) == 0){
                if($params['thumb'] !== NULL){
                    $path   = $request->file('thumb');
                    $resize = Image::make($path)
                                    ->resize(1000, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    })
                                    ->encode('jpg');

                    $image_name = md5($resize->__toString()."".time());
                    Storage::put('public/assets/images/thumbs/'.$image_name.'.jpg', $resize->__toString());
                    $params['thumb'] = 'public/assets/images/thumbs/'.$image_name.'.jpg';
                }

                $gallery_id = Gallery::insertGetId([
                    'name' => $params['name'],
                    'thumb' => $params['thumb'],
                    'status' => $params['status']
                ]);

                for($i=0; $i<count($params['id']); $i++){
                    RMediaGallery::insert([
                        'name' => 'prova',
                        'gallery_id' => $gallery_id,
                        'media_id' => $params['id'][$i],
                        'position' => $params['position'][$i]
                    ]);
                }
                Logs::save(Logs::ACTION_CREATE, "Creazione di una galleria", Session::get('admin')->id);
            } else {
                dd($errs);
                return view(self::ITEM_VIEW)->with('errs', $errs);
            }
        }
        return redirect(self::ITEMS_PATH);
    }


    public function update(Request $request, $id){
        if($request->isMethod('post')){
            $params = self::getParams($request);

            if($params['thumb'] !== NULL){
                $path   = $request->file('thumb');
                $resize = Image::make($path)
                                ->resize(1000, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->encode('jpg');

                $image_name = md5($resize->__toString()."".time());
                Storage::put('public/assets/images/thumbs/'.$image_name.'.jpg', $resize->__toString());
                $params['thumb'] = 'public/assets/images/thumbs/'.$image_name.'.jpg';
            }
            Gallery::whereId($id)->update([
                'name' => $params['name'],
                'thumb' => $params['thumb'],
                'status' => $params['status']
            ]);

            RMediaGallery::where('gallery_id', $id)->delete();

            for($i=0; $i<count($params['id']); $i++){
                RMediaGallery::insert([
                    'name' => 'prova',
                    'gallery_id' => $id,
                    'media_id' => $params['id'][$i],
                    'position' => $params['position'][$i]
                ]);
            }
            Logs::save(Logs::ACTION_UPDATE, "Modifica della galleria con id: ".$id, Session::get('admin')->id);
        }
        return redirect(self::ITEMS_PATH);
    }

    public function delete(Request $request, $id){
        Gallery::whereId($id)->delete();
        Logs::save(Logs::ACTION_DELETE, "Eliminazione della galleria con id: ".$id, Session::get('admin')->id);
        return redirect(self::ITEMS_PATH);
    }

    private function getLastPosition(){
        return Gallery::max('position');
    }

    private function getParams(Request $request){
        $params = array(
            'name' => $request['name'],
            'thumb' => $request['thumb'],
            'status' => $request['status'],
            'id' => ($request['id'] === NULL ? array() : $request['id'])
        );

        $params['position'] = range(1, count($request['id']));
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
