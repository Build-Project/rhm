<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumType extends Model
{
    protected $table = 'z_album_type';
    protected $primaryKey = 'TID';

    public $timestamps = false;

    public function albums(){
        return $this->hasMany('App\Models\Album', 'ATypeID');
    }
}
