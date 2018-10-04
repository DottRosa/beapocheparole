<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentsCategories;

class AdminDocumentsCategories extends Controller{

    const ITEMS_PATH = 'admin/documents/categories';
    const ITEMS_VIEW = 'admin.documents_categories';

    public function __invoke(){
        $items = DocumentsCategories::simplePaginate(20);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
