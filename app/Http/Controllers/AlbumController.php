<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Album;
use App\Models\Production;
use App\Models\AlbumType;
use Carbon\Carbon;

class AlbumController extends Controller
{
    public function albumPage(){
        return view('admin.album.list_album', array('title'=>'Album Page'));
    }

    public function listAlbums(){
        $albums = Album::with(
            array(
                'type'=>function($query){
                    $query->select("TID", "TName");
                },
                'production'=>function($query){
                    $query->select("ProID","ProName");  
                })
            )->get();
        return $albums->toJson();
    }

    public function createAlbumPage(){
        $production = Production::all();
        $type = AlbumType::all();
        return view('admin.album.create_album', array('title'=>'Create Album Page', 'pro'=>$production, 'type'=>$type));
    }

    public function createAlbum(Request $request){
        $album = new Album();
        $album->AName = $request->get('albumName');
        $album->AAlias = $request->get('albumAlias');
        $album->ASR = $request->get('asr');
        $album->ADescription = $request->get('albumDes');
        $album->ATypeID = $request->get('type');
        $album->AProID = $request->get('production');
        $album->CDate = Carbon::now();
        $album->CBy = $request->get('albumUser');
        
        $extension = $request->file('albumLogo')->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;

        $album->AThumb = $fileName;

        $request->file('albumLogo')->move(
            base_path().'/public/images/album/'.$album->TID.'/',$fileName
        );
        if($album->save()){
            alert()->success('Success', 'Album create successfully!')->autoclose(3000);
            return redirect()->back();
        }
        alert()->error('Failed', 'Failed creating album!')->autoclose(3000);
        return redirect()->back();
    }
}
