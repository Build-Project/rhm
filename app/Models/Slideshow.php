<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
   protected $table = 'z_slideshow';
   protected $primaryKey = "SLSID";

   public $timestamps = false;
}
