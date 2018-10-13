<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class Logs{

    const ACTION_LOGIN = 'LOGIN';
    const ACTION_LOGOUT = 'LOGOUT';
    const ACTION_CREATE = 'CREATE';
    const ACTION_UPDATE = 'UPDATE';
    const ACTION_DELETE = 'DELETE';

    public static function save($action, $description, $user_id){
        $params = array(
            'action' => $action,
            'description' => $description,
            'user_id' => $user_id
        );
        DB::table('LOGS')->insert($params);
    }
}
