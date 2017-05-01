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

    public function create(Request $request){
        $slide = new Slideshow();
        $slide->SLSName = $request->get('slideName');
        $slide->SLSDescription = $request->get('sildeDes');
        $slide->SLStatus = $request->get('slideStatus');
        $extension = $request->file('slideImage')->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;

        $slide->SLSImage = $fileName;

        $request->file('slideImage')->move(
            base_path().'/public/images/slides/',$fileName
        );

        if($slide->save()){
             return redirect()->back()->with('msg', 'Slideshow created successfully.');
        }
        return redirect()->back()->with('msg', 'Failed creating slideshow.');
    }
}
