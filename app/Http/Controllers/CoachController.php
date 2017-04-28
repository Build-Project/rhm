<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Coach;

class CoachController extends Controller
{

    public function index(){
        return view('admin.coach', array('title'=>'Coach Page'));
    }

    public function listCoachs(){
        $coachs = Coach::all();
        return $coachs->toJson();
    }
}
