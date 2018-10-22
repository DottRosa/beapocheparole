<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery as GalleryModel;
use App\Tags;
use App\Media;

class Gallery extends Controller{
    const ITEM_PATH = 'gallery';
    const ITEM_VIEW = 'gallery';

    public function __invoke(Request $request){
        $id = $request->id;

        $item = GalleryModel::find($id);
        $item['media'] = Media::join('R_MEDIA_GALLERY', 'R_MEDIA_GALLERY.media_id', '=', 'MEDIA.id')
                              ->where('R_MEDIA_GALLERY.gallery_id', '=', $id)
                              ->orderBy('R_MEDIA_GALLERY.position', 'ASC')
                              ->get();

        return view(self::ITEM_VIEW)->with('item',$item);
    }
}
