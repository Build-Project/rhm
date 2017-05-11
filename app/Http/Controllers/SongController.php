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
        $songs = Song::with(array('album'=>function($query){
            $query->select("AID", "AName");
        }))->get();
        return $songs->toJson();
    }

    public function createSong(Request $request){
        $song = new Song();
        $song->SName = $request->get('songName');
        $song->SAlias = $request->get('songAlias');
        $song->SAlbumID = $request->get('albumId');

        $extension = $request->file('songFile')->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;

        $song->SURL = $song->SAlbumID.'/'.$fileName;

        $request->file('songFile')->move(
            base_path().'/public/album/'.$song->SAlbumID.'/',$fileName
        );

        if($song->save()){
             return redirect()->back()->with('msg', 'Song created successfully.');
        }
        return redirect()->back()->with('msg', 'Failed creating song.');
    }
}
