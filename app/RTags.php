<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RTags extends Model{
    protected $table = 'R_MEDIA_TAGS';
    protected $fillable = array('media_id', 'tag_id');
    public $timestamps = false;
}
