<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function loginForm(){
        return view('Login');
    }
    public function store(Request $request){
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password])){
        return redirect('/');
    }
        dd('Login Fail');
        return redirect()->route('login')->with('errmsg', 'Sai tai khoan mat khau');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
