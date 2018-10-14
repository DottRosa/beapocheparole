<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RMediaGallery extends Model{
    protected $table = 'R_MEDIA_GALLERY';
    protected $fillable = array('name', 'gallery_id', 'media_id', 'position');
    public $timestamps = false;
}
