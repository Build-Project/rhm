<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = "z_season";
    protected $primaryKey = 'SSID';

    public $timestamps = false;
}
