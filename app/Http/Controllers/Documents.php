<?php

namespace App\Http\Controllers;

use App\Media;

class Documents extends Controller{
    const ITEMS_PATH = 'testi';
    const ITEMS_VIEW = 'documents';

    public function __invoke(){
        $items = Media::where([
            ['type' ,'TXT'],
            ['status', 'PUBLIC']
        ])->simplePaginate(10);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
