<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Utils\Logs;

class AdminUsers extends Controller{

    const ITEMS_PATH = 'admin/users';
    const ITEMS_VIEW = 'admin.users';

    public function __invoke(){
        $items = Users::simplePaginate(20);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
