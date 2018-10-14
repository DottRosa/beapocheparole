<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Media;

class AdminDocuments extends Controller{

    const ITEMS_PATH = 'admin/documents/list';
    const ITEMS_VIEW = 'admin.documents';

    public function __invoke(){
        $items = Media::where('type', 'TXT')->simplePaginate(20);

        foreach($items as $item){
            $tags = DB::select(
                      DB::raw("SELECT TAGS.name
                               FROM TAGS
                               INNER JOIN R_MEDIA_TAGS ON (R_MEDIA_TAGS.tag_id = TAGS.id)
                               WHERE R_MEDIA_TAGS.media_id = :item_id"), array('item_id' => $item->id));
            $item['tags'] = $tags;
        }

        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}