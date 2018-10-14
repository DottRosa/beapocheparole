<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Media;
use App\Tags;
use App\RTags;

class AdminMedia extends Controller{

    public function search(Request $request){
        $q = $request->q;
        $offset = $request->offset;
        $limit = $request->limit;
        $type = $request->type;

        //TODO cercare anche tra i nomi dei tag
        $items = Media::where([
                    ['title', 'like', '%'.$q.'%'],
                    ['type', '=', $type]
                 ])
                  ->offset($offset)
                  ->limit($limit)
                  ->get();

        $total = Media::where([
                      ['title', 'like', '%'.$q.'%'],
                      ['type', '=', $type]
                 ])
                 ->count();

        $result = array(
            'total' => $total,
            'items' => $items
        );

        return json_encode($result);

    }
}
