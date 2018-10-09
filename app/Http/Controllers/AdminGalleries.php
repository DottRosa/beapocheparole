<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Utils\Logs;

class AdminGalleries extends Controller{

    const ITEMS_PATH = 'admin/galleries/list';
    const ITEMS_VIEW = 'admin.galleries';

    public function __invoke(){
        $items = Gallery::simplePaginate(20);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
