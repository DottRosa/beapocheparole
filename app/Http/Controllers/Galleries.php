<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Galleries extends Controller{
    const ITEMS_PATH = 'gallerie';
    const ITEMS_VIEW = 'galleries';

    public function __invoke(){
        //$items = Users::simplePaginate(20);  ->with('items', $items)
        return view(self::ITEMS_VIEW);
    }
}
