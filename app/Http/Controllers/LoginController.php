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
        dd($request->get('userName'));
        $userData = array(
            'ZUName' => $request->get('userName'),
            'ZUPassword' =>$request->get('password')
        );
        if(Auth::attempt($userData)){
            
            return view('admin.index');
        }
        return redirect()->back();
    }
}
