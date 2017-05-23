<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Guard;

class LoginController extends Controller
{

    public function showLoginPage(){
        return view('auth.login', array('title'=>'Login Page'));
    }

    public function customLogin(Request $request){
        //dd($request->all());
        if(Auth::attempt(['ZUName'=>$request->get('userName'),'ZUPassword'=>$request->get('password')])){
            dd($request->get('userName'));
            return view('admin.index');
        }
        return redirect()->back();
    }
}
