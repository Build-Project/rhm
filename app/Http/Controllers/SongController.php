<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Song;

class SongController extends Controller
{
    public function listPage(){
        return view('admin.song.list', array('title'=>'Song Page'));
    }

    public function listSongs(){
        $songs = Song::all();
        return $songs->toJson();
    }
}
