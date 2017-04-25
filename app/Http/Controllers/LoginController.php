<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Guard;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->auth = $auth;
    }

    public function showLoginPage(){
        return view('auth.login', array('title'=>'Login Page'));
    }

    public function customLogin(Request $request){

       return view('welcome', array('msg'=>$request['userName']));
    }
}
