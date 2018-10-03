<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class AdminUsers extends Controller{

    public function __invoke(){
        $items = Users::all();
        return view('admin.users')->with('items', $items);
    }
}
