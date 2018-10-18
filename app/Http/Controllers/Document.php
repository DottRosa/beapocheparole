<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;

class Document extends Controller{
    const ITEMS_PATH = 'testo';
    const ITEMS_VIEW = 'document';

    public function __invoke(Request $request){
        $item = Media::find($request->id);
        return view(self::ITEMS_VIEW)->with('item', $item);
    }
}
