<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logs;

class AdminLogs extends Controller{

    public function __invoke(){
        $items = Logs::join('USERS', 'user_id', '=', 'USERS.id')
                    ->select('LOGS.*', 'USERS.username')
                    ->orderBy('LOGS.creation_date','DESC')->simplePaginate(20);
        return view('admin.logs')->with('items', $items);
    }
}
