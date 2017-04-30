<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//use App\Models\Coach;

class CoachController extends Controller
{
    public function coachPage(){
        return view('admin.coach', array('title'=>'Coach Page'));
    }
}
