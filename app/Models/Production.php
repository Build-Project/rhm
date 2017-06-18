<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'z_production';
    protected $primaryKey = 'ProID';

    public $timestamps = false;

    public function albums(){
        return $this->hasMany('App\Models\Album','AProID');
    }
}
