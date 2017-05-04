<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Album;

class AlbumController extends Controller
{
    public function albumPage(){
        return view('admin.album.list_album', array('title'=>'Album Page'));
    }

    public function listAlbums(){
        $albums = Album::with('songs')->get();
        return $albums->toJson();
    }
}
