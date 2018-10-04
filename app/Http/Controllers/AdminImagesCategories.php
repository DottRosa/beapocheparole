<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImagesCategories;

class AdminImagesCategories extends Controller{

    const ITEMS_PATH = 'admin/images/categories';
    const ITEMS_VIEW = 'admin.images_categories';

    public function __invoke(){
        $items = ImagesCategories::simplePaginate(20);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }

    public function find(Request $request){
        return ImagesCategories::where('name', 'LIKE', '%'.$request->q.'%')->get();
    }
}
