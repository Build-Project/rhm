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

    function login(Request $request){
        $username = $request['userName'];
        $password = $request['password'];
        if(Auth::attempt([
            'ZUName' => $username,
            'ZUPassword' => $password
        ])){
            return redirect()->route('admin.index');
        }else {
            return redirect()->back()
                ->with('message','Incorrect username or password')
                ->with('status', 'danger')
                ->withInput();
        }
    }
}
