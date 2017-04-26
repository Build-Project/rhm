<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'z_module';
    protected $primaryKey = 'MID';

    public $timestamps = false;
}
