<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Album;
use App\Models\Production;
use Carbon\Carbon;

class AlbumController extends Controller
{
    public function albumPage(){
        return view('admin.album.list_album', array('title'=>'Album Page'));
    }

    public function listAlbums(){
        $albums = Album::with('songs')->get();
        return $albums->toJson();
    }

    public function createAlbumPage(){
        $production = Production::all();
        return view('admin.album.create_album', array('title'=>'Create Album Page', 'pro'=>$production));
    }

    public function createAlbum(Request $request){
        $album = new Album();
        $album->AName = $request->get('albumName');
        $album->AAlias = $request->get('albumAlias');
        $album->ASR = $request->get('asr');
        $album->ADescription = $request->get('albumDes');
        $album->AType = $request->get('albumType');
        $album->AProID = $request->get('albumProduction');
        $album->Apopular = $request->get('albumPopular');
        $album->AThumb = $request->get('albumThunb');
        $album->CDate = Carbon::now();
        $album->CBy = $request->get('albumUser');
        if($album->save()){
            alert()->success('Success', 'Album create successfully!')->autoclose(3000);
            return redirect()->back();
        }
        alert()->error('Failed', 'Failed creating album!')->autoclose(3000);
        return redirect()->back();
    }
}
