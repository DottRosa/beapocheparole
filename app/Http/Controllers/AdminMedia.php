<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Media;
use App\MediaTags;
use App\RMediaTags;

class AdminMedia extends Controller{

    public function search(Request $request){
        $q = $request->q;
        $offset = $request->offset;
        $limit = $request->limit;
        $type = $request->type;
        $tags = array('1');

        //TODO cercare anche tra i nomi dei tag
        if(count($tags) == 0){
          $itemsFromTitle = Media::where([
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

        }else{
          $sqlMedia = 'SELECT *
                      FROM R_MEDIA_TAGS INNER JOIN MEDIA ON R_MEDIA_TAGS.media_id=MEDIA.id
                      WHERE ';
          foreach ($tags as $tag) {
            $sqlMedia .= 'R_MEDIA_TAGS.tag_id=\''.$tag.'\' AND ';
          }
          $sqlMedia .= 'MEDIA.type=\''$type'\' AND MEDIA.title LIKE \'%'$q'%\'';
          $sqlMedia .= ' LIMIT '.$limit;
          $sqlMedia .= ' OFFSET '.$offset;

          $itemsFromTag = DB::select(DB::raw($sqlMedia));

          $sqlMediaTotal = 'SELECT *
                      FROM R_MEDIA_TAGS INNER JOIN MEDIA ON R_MEDIA_TAGS.media_id=MEDIA.id
                      WHERE ';
          foreach ($tags as $tag) {
            $sqlMediaTotal .= 'R_MEDIA_TAGS.tag_id=\''.$tag.'\' AND ';
          }
          $sqlMediaTotal .= 'MEDIA.type=\''$type'\' AND MEDIA.title LIKE \'%'$q'%\'';

          $total = DB::select(DB::raw($sqlMediaTotal))
                   ->count();
        }

        $result = array(
            'total' => $total,
            'items' => $items
        );

        return json_encode($result);

    }
}
