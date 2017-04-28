<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class coach extends Model
{
    protected $table = 'z_coach';
    protected $primaryKey = 'COID';

    protected $timestamp = false;
}
