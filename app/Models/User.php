<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'z_user';
    protected $primaryKey = 'ZUID';

    protected $fillable = [
        'ZUName', 'ZUPassword',
    ];

    protected $hidden = [
        'ZUPassword'
    ];

    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->ZUPassword;
    }
}
