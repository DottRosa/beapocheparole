<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Document extends Controller{
    const ITEMS_PATH = 'testo';
    const ITEMS_VIEW = 'document';

    public function __invoke(){
        //$items = Users::simplePaginate(20);  ->with('items', $items)
        return view(self::ITEMS_VIEW);
    }
}
