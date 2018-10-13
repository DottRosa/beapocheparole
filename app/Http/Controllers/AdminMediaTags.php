<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MediaTags;

class AdminMediaTags extends Controller{

    const ITEMS_PATH = 'admin/tags';
    const ITEMS_VIEW = 'admin.tags';

    public function __invoke(){
        $items = MediaTags::simplePaginate(20);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }

    public function find(Request $request){
        return MediaTags::where('name', 'LIKE', '%'.$request->q.'%')->get();
    }
}
