<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Production;
use Carbon\Carbon;

class ProductionController extends Controller
{
    public function showProductionPage(){
        return view('admin.production.list_production', array('title'=>'Production Page'));
    }

    public function listProduction(){
        $productions = Production::all();
        return $productions->toJson();
    }

    public function showCreateProductionPage(){
        return view('admin.production.create_production', array('title'=>'Create Production Page'));
    }

    public function createProduction(Request $request){
        $pro = new Production();
        $pro->ProName = $request->get('proName');
        $pro->ProAlias = $request->get('proAlias');
        $extension = $request->file('proLogo')->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $pro->ProLogo = $fileName;
        $request->file('proLogo')->move(
            base_path().'/public/productions/'.$pro->ProID.'/',$fileName
        );
        $pro->CDate = Carbon::now();
        $pro->CBy = $request->get('proUser');
        $pro->ProDescription = $request->get('proDes');

        if($pro->save()){
            alert()->success('Success', 'Production create successfully!')->autoclose(3000);
            return redirect('admin/production');
        }
        alert()->error('Failed', 'Failed creating production!')->autoclose(3000);
        return redirect()->back();
    }

    public function deleteProduction($id, Request $request){
        $pro = Production::find($id);

        File::delete(public_path().'/production/'.$id.'/'.$pro->ProLogo);
        if($pro->delete()){
            return response(['msg'=>'Production Deleted successfully!', 'status' => 'success']);
        }
        return response(['msg'=>'Failed Deleting production!', 'status' => 'failed']);
    }

    public function showEditProductionPage($id){
        $pro = Production::find($id);
        return view('admin.production.update_production', array('title'=>'Edit Production Page', 'pro'=>$pro));
    }
}
