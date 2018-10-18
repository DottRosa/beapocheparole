<?php

namespace App\Http\Controllers;

use App\Errors;

class AdminErrors extends Controller{
    const ITEMS_PATH = 'admin/errors';
    const ITEMS_VIEW = 'admin.errors';

    public function __invoke(){
        $items = Errors::orderBy('creation_date', 'DESC')->simplePaginate(25);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
