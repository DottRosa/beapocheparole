<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminImages extends Controller{

    public function __invoke(){
        return view('admin.images', ['user' => '']);
    }
}
