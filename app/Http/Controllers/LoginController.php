<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function username(){
        return 'ZUName';
    }

    public function showLoginPage(){
        return view('auth.login', array('title'=>'Login Page'));
    }

    public function authenticate(Request $request){
        
        if(Auth::attempt(['ZUName'=>$request->get('userName'), 'ZUPassword'=>$request->get('password')])){
            alert()->success('Login successfully!')->autoclose(3000);
            return redirect()->intended('admin');
        }
        alert()->error('Login Failed!')->autoclose(3000);
        dd($request->all());
        return redirect()->back();
    }
}
