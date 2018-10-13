<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Media;

class AdminDocuments extends Controller{

    const ITEMS_PATH = 'admin/documents/list';
    const ITEMS_VIEW = 'admin.documents';

    public function __invoke(){
        $items = Media::where('type', 'TXT')->simplePaginate(20);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
