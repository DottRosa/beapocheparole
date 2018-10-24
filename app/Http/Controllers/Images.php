<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Media;
use App\Tags;

class Images extends Controller{
    const ITEMS_PATH = 'immagini';
    const ITEMS_VIEW = 'images';
    const LIMIT = 16;

    public function __invoke(Request $request){
        $tags = Tags::orderBy('name','ASC')->get();
        $tags_filter = $request->tags;  //Tag passati come parametro
        $filter_by_tag = $tags_filter !== null; //True se i filtri sono stati applicati frontend

        if($filter_by_tag){
            if($filter_by_tag){
                for($i=0; $i<count($tags); $i++){   //Rende attivi i tag scelti per filtrare
                    $tags[$i]['active'] = (in_array($tags[$i]->id, $tags_filter));
                }
            }

            /* INIZIO QUERY DI RICERCA PER TAG */
            $query = 'SELECT MEDIA.id';
            $query .= ' FROM (';
            $query .= ' SELECT m1 AS media_id FROM ';

            for($i=1; $i<=count($tags_filter); $i++){
                $query .= ' (SELECT media_id AS m'.$i.' FROM R_MEDIA_TAGS WHERE tag_id=\''.$tags_filter[$i-1].'\') T'.$i;
                if($i < count($tags_filter)){
                    $query .= ' INNER JOIN ';
                }
            }
            if(count($tags_filter) != 1){
                $query .= ' WHERE';

                for($j=1; $j<=count($tags_filter); $j++){

                    if($j + 1 <= count($tags_filter)){
                        $query .= ' m'.$j.' = m'.($j+1).' ';
                    }
                    if($j + 1 < count($tags_filter)){
                        $query .= ' AND ';
                    }
                }
            }
            $query .= ' ) AS F_TAGS';
            $query .= ' INNER JOIN MEDIA ON F_TAGS.media_id = MEDIA.id';
            $query .= ' WHERE MEDIA.type="IMG" AND status = "PUBLIC"';
            $query .= ' GROUP BY id';

            /* FINE QUERY DI RICERCA PER TAG */

            $all_items = DB::select(DB::raw($query));           //Eseguo la query
            $all_items_ids = array_column($all_items, 'id');    //Prendo gli id e ne faccio un array
            //Prelevo solo i tag in base agli id (così posso applicare la paginazione)
            $items = Media::whereIn('id', $all_items_ids)->simplePaginate(self::LIMIT);

        } else {
            $items = Media::where([
                ['type' ,'IMG'],
                ['status', 'PUBLIC']
            ])->simplePaginate(self::LIMIT);
        }

        return view(self::ITEMS_VIEW)->with('items', $items)->with('tags', $tags)->with('filter_by_tag', $filter_by_tag);
    }
}
