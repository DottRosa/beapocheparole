<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Gallery;
use App\Media;
use App\MediaTags;
use App\RMedia;

class AdminGallery extends Controller{

    const ITEMS_PATH = 'admin/galleries/list';
    const ITEMS_VIEW = 'admin.galleries';
    const ITEM_VIEW = 'admin.gallery';

    public function __invoke(){
        $tags = MediaTags::orderBy('name','ASC')->get();
        return view(self::ITEM_VIEW)->with('tags', $tags);
    }

    public function get($id){
        $tags = MediaTags::orderBy('name','ASC')->get();
        if($id !== NULL){
            $item = Gallery::find($id);

            $item['media'] = Media::join('R_MEDIA', 'R_MEDIA.media_id', '=', 'MEDIA.id')
                                  ->where('R_MEDIA.gallery_id', '=', $id)
                                  ->orderBy('R_MEDIA.position', 'ASC')
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
                    RMedia::insert([
                        'name' => 'prova',
                        'gallery_id' => $gallery_id,
                        'media_id' => $params['id'][$i],
                        'position' => $params['position'][$i]
                    ]);
                }
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

            RMedia::where('gallery_id', $id)->delete();

            for($i=0; $i<count($params['id']); $i++){
                RMedia::insert([
                    'name' => 'prova',
                    'gallery_id' => $id,
                    'media_id' => $params['id'][$i],
                    'position' => $params['position'][$i]
                ]);
            }
        }
        return redirect(self::ITEMS_PATH);
    }

    public function delete(Request $request, $id){
        Gallery::whereId($id)->delete();
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
