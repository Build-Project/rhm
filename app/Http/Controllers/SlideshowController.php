<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Slideshow;

class SlideshowController extends Controller
{

    public function slideShowPage(){
        return view('admin.slideshow.list',array("title"=>"Slide Show"));
    }

    public function listSlideshows(){
    	$slideshow = Slideshow::all();
    	return $slideshow->toJson();
    }
}
