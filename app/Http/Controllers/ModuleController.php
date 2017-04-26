<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Module;

class ModuleController extends Controller
{
    
    public function createModule(Request $request){
        $module = new Module();
        $module->MName = $request['moduleName'];
        $module->MDescription = $request['moduleDes'];
        $module->MType = $request['moduleType'];
        $module->MSR = $request['moduleSortOrder'];
        $module->MStatus = $request['moduleStatus'];
        $module->save();
        return redirect()->back();
    }

    public function listModules(){
        $modules = Module::all();
        return view('admin.module.list', array('title'=>'Module Page', 'modules'=>$modules));
    }

    public function deleteModule($id, Request $request){
        $module = Module::find($id);
        if($module->delete($request->all())){
             return response(['msg'=>'Module Deleted', 'status' => 'success']);
        }
        return response(['msg'=>'Failed Deleting the product', 'status' => 'failed']);
    }

    public function loadModuleDataById($id){
        $module = Module::find($id);
        return view('admin.module.update', array('title'=>'Update Module Page','module'=>$module));
    }
}
