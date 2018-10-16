<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Gallery extends Controller{
    const ITEMS_PATH = 'gallery';
    const ITEMS_VIEW = 'gallery';

    public function __invoke(){
        //$items = Users::simplePaginate(20);  ->with('items', $items)
        return view(self::ITEMS_VIEW);
    }
}
