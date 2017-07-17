<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'z_album';
    protected $primaryKey = 'AID';

    const CREATED_AT = 'CDate';
    const UPDATED_AT = 'MDate';

    public function songs(){
        return $this->hasMany('App\Models\Song', 'SAlbumID');
    }

    public function type(){
        return $this->belongsTo('App\Models\AlbumType', 'ATypeID');
    }

    public function production(){
        return $this->belongsTo('App\Models\Production', 'AProID');
    }
}
