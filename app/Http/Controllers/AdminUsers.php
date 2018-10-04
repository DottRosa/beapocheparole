<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Utils\Logs;

class AdminUsers extends Controller{

    public function __invoke(){
        $items = Users::simplePaginate(20);

        return view('admin.users')->with('items', $items);
    }
}
