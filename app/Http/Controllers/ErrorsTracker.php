<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Errors;

class ErrorsTracker extends Controller{
    public function report(Request $request){
        $params = array(
            'message' => $request->error,
            'url' => $request->url,
            'page' => $request->page,
            'line' => $request->line,
        );

        Errors::forceCreate($params);
        return 'funziona';
    }
}
