<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Documents extends Controller{
    const ITEMS_PATH = 'testi';
    const ITEMS_VIEW = 'documents';

    public function __invoke(){
        //$items = Users::simplePaginate(20);  ->with('items', $items)
        return view(self::ITEMS_VIEW);
    }
}
