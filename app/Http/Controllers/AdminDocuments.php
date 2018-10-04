<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documents;

class AdminDocuments extends Controller{

    const ITEMS_PATH = 'admin/documents/list';
    const ITEMS_VIEW = 'admin.documents_list';

    public function __invoke(){
        $items = Documents::simplePaginate(20);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
