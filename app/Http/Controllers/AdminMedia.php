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
        $tags = $request->tags;

        if($tags === null){
            $tags = array();
        }

        $items = array();

        if(count($tags) == 0){
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

        } else {

            $sqlMedia = 'SELECT MEDIA.id, MEDIA.title, MEDIA.content, MEDIA.type';
            $sqlMedia .= ' FROM (';
            $sqlMedia .= ' SELECT m1 AS media_id FROM ';

            for($i=1; $i<=count($tags); $i++){
                $sqlMedia .= ' (SELECT media_id AS m'.$i.' FROM R_MEDIA_TAGS WHERE tag_id=\''.$tags[$i-1].'\') T'.$i;
                if($i < count($tags)){
                    $sqlMedia .= ' INNER JOIN ';
                }
            }

            if(count($tags) != 1){
                $sqlMedia .= ' WHERE';

                for($j=1; $j<=count($tags); $j++){

                    if($j + 1 <= count($tags)){
                        $sqlMedia .= ' m'.$j.' = m'.($j+1).' ';
                    }
                    if($j + 1 < count($tags)){
                        $sqlMedia .= ' AND ';
                    }
                }
            }

            $sqlMedia .= ' ) AS F_TAGS';
            $sqlMedia .= ' INNER JOIN MEDIA ON F_TAGS.media_id = MEDIA.id';
            $sqlMedia .= ' WHERE MEDIA.type=\''.$type.'\' AND MEDIA.title LIKE \'%'.$q.'%\'';
            $sqlMedia .= ' GROUP BY id';

            $total = count(DB::select(DB::raw($sqlMedia)));

            $sqlMedia .= ' LIMIT '.$limit;
            $sqlMedia .= ' OFFSET '.$offset;

            $items = DB::select(DB::raw($sqlMedia));
        }

        $result = array(
            'total' => $total,
            'items' => $items
        );

        return json_encode($result);

    }
}
