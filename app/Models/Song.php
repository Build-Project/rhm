<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'z_song';
    protected $primaryKey = 'SID';

    const CREATED_AT = 'CDate';
    const UPDATED_AT = 'MDate';

    public function album(){
        return $this->belongsTo('App\Models\Album', 'AID');    
    }
}
