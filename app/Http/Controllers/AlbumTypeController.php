<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AlbumType;
use Carbon\Carbon;

class AlbumTypeController extends Controller
{
    public function showAlbumTypePage(){
        return view('admin.album-type.list_album_type', array('title'=>'Album Type Page'));
    }

    public function listAlbumType(){
        $types = AlbumType::orderBy('TSR')->get();
        return $types->toJson();
    }

    public function showCreateAlbumTypePage(){
        return view('admin.album-type.create_album_type', array('title'=>'Create Album Type Page'));
    }

    public function createAlbumType(Request $request){
        $type = new AlbumType();
        $type->TName = $request->get('atName');
        $type->TAlias = $request->get('atAlias');
        $type->TSR = $request->get('atSR');
        $type->TDescription = $request->get('atDes');
        $type->CDate = Carbon::now();
        $type->CBy = $request->get('atUser');
        if($type->save()){
            alert()->success('Success', 'Album Type create successfully!')->autoclose(2000);
            return redirect()->back();
        }
        alert()->error('Failed', 'Failed creating album type!')->autoclose(2000);
        return redirect()->back();
    }
}
