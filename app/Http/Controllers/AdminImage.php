<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Media;
use App\Tags;
use App\RTags;
use App\Utils\Logs;

class AdminImage extends Controller{

    const ITEMS_PATH = 'admin/images/list';
    const ITEMS_VIEW = 'admin.images';
    const ITEM_VIEW = 'admin.image';

    public function __invoke(){
        $tags = Tags::orderBy('name','ASC')->get();
        return view(self::ITEM_VIEW)->with('tags', $tags);
    }

    public function get($id){
        if($id !== NULL){
            $item = Media::find($id);
            $tags = DB::select(
                      DB::raw("SELECT TAGS.id
                               FROM TAGS
                               INNER JOIN R_MEDIA_TAGS ON (R_MEDIA_TAGS.tag_id = TAGS.id)
                               WHERE R_MEDIA_TAGS.media_id = :item_id"), array('item_id' => $item->id));

            $tags_ids = [];
            foreach($tags as $tag){
                $tags_ids[] .= $tag->id;
            }
            $item['tags'] = $tags_ids;

            return view(self::ITEM_VIEW)->with('item',$item)->with('tags', self::getTags());
        }
        return view(self::ITEM_VIEW);
    }

    public function getTags(){
        return Tags::orderBy('name','ASC')->get();
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $params = self::getParams($request);
            $errs = self::verify($params);

            if(count($errs) == 0){
                $path   = $request->file('content');
                $resize = Image::make($path)
                                ->resize(1500, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->encode('jpg');

                $image_name = md5($resize->__toString()."".time());
                Storage::put('public/assets/images/'.$image_name.'.jpg', $resize->__toString());
                $params['content'] = 'public/assets/images/'.$image_name.'.jpg';

                $data = Media::forceCreate($params);
                $media_id = $data->id;

                foreach($request['tags'] as $tag){
                    RTags::create([
                        'media_id' => $media_id,
                        'tag_id' => $tag
                    ]);
                }

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

            if($params['content'] === NULL || $params['content'] === ''){
                unset($params['content']);
            } else {
                $path   = $request->file('content');
                $resize = Image::make($path)
                                ->resize(1500, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->encode('jpg');

                $image_name = md5($resize->__toString()."".time());
                Storage::put('public/assets/images/'.$image_name.'.jpg', $resize->__toString());
                $params['content'] = 'public/assets/images/'.$image_name.'.jpg';
            }

            Media::whereId($id)->update($params);

            RTags::where('media_id', $id)->delete();
            foreach($request['tags'] as $tag){
                RTags::create([
                    'media_id' => $id,
                    'tag_id' => $tag
                ]);
            }

            Logs::save(Logs::ACTION_UPDATE, "Modifica dell'immagine con id: ".$id, Session::get('admin')->id);
        }
        return redirect(self::ITEMS_PATH);
    }

    public function delete(Request $request, $id){
        Media::whereId($id)->delete();
        Logs::save(Logs::ACTION_DELETE, "Eliminazione dell'immagine con id: ".$id, Session::get('admin')->id);
        return redirect(self::ITEMS_PATH);
    }



    private function getParams(Request $request){
        $params = array(
            'title' => $request['title'],
            'content' => $request['content'],
            'type' => 'IMG',
            'status' => $request['status'],
        );

        return $params;
    }

    private function verify($params){
        $errs = array();

        if($params['title'] == NULL || trim($params['title']) == ''){
            $errs['title'] = 'Devi inserire il nome';
        }
        if($params['content'] == NULL || trim($params['content']) == ''){
            $errs['content'] = 'Devi inserire un\'immagine';
        }

        return $errs;
    }
}
