<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Season;
use Carbon\Carbon;

class SeasonController extends Controller
{
    public function seasonPage(){
        return view('admin.season.list_season', array('title'=>'Seasons Page'))
    }

    public function listSeasons(){
        $seasons = Season::all();
        return $seasons->toJson();
    }

    public function createPage(){
        return view('admin.season.create_season', array('title'=>'Create Season'));
    }

    public function createSeason(Request $request){
        $season = new Season();
        $season->SSName = $request->get('ssName');
        $season->SSDescription = $request->get('ssDes');
        $season->CDate = Carbon::now();
        $season->CBy = $request->get('user');

        if($season->save()){
            alert()->success('Season created successfully!')->autoclose(3000);
            return redirect('admin/season');
        }
        alert()->error('Failed creating season!')->autoclose(3000);
        return redirect()->back();  
    }

    public function editPage($id){
        $season = Season::find($id);
        return view('admin.season.update_season', array('season'=>$season));
    }

    public function editSeason(Request $request, $id){
        $season = Season::find($id);
        $season->SSName = $request->get('ssName');
        $season->SSDescription = $request->get('ssDes');
        $season->MDate = Carbon::now();
        $season->MBy = $request->get('user');
        if($season->save()){
            alert()->success('Season updated successfully!')->autoclose(3000);
            return redirect('admin/season');
        }
        alert()->error('Failed updating season!')->autoclose(3000);
        return redirect()->back();
    }
}
