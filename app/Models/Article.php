<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'z_article';
    protected $primaryKey = 'ARTID';

    public $timestamps = false;

    protected $dates = [
        'CDate','MDate'
    ];

    public function getCDate($cdate){
        return date_format($cdate, 'd/m/Y H:i:s');
    }
}
