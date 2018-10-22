<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class Galleries extends Controller{
    const ITEMS_PATH = 'gallerie';
    const ITEMS_VIEW = 'galleries';

    public function __invoke(){
        $items = Gallery::where('status', '=', 'PUBLIC')->simplePaginate(20);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
