<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RMedia extends Model{
    protected $table = 'R_MEDIA';
    protected $fillable = array('name', 'gallery_id', 'media_id', 'position');
    public $timestamps = false;
}
