<?php

namespace App\Http\Controllers;

use App\Media;

class Images extends Controller{
    const ITEMS_PATH = 'immagini';
    const ITEMS_VIEW = 'images';

    public function __invoke(){
        $items = Media::where([
            ['type' ,'IMG'],
            ['status', 'PUBLIC']
        ])->simplePaginate(10);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
