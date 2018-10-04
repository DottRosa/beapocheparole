<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logs;

class AdminLogs extends Controller{

    const ITEMS_PATH = 'admin/logs';
    const ITEMS_VIEW = 'admin.logs';

    public function __invoke(){
        $items = Logs::join('USERS', 'user_id', '=', 'USERS.id')
                    ->select('LOGS.*', 'USERS.username')
                    ->orderBy('LOGS.creation_date','DESC')->simplePaginate(20);
        return view(self::ITEMS_VIEW)->with('items', $items);
    }
}
