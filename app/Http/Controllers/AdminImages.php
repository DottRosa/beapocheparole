<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Images;

class AdminImages extends Controller{

    const ITEMS_PATH = 'admin/images/list';
    const ITEMS_VIEW = 'admin.images';

    public function __invoke(){
        $items = Images::simplePaginate(20);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
