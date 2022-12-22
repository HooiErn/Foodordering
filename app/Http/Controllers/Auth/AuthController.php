<?php

namespace App\Http\Controllers\Auth;

use DB;
use Cookie;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

// here is the code for settling login,logout function
class AuthController extends Controller
{
    public function index(){

        return view('auth.login');

    }

    //Login
    public function postLogin(Request $request){

        $request->validate([
            'password' => 'required',
            'email' => 'required',
        ]);

        if($request->has('rememberme')){
            Cookie::queue('email',$request->email,1440); //1440 means it stays for 24 hours
            Cookie::queue('password',$request->password,1440);
        }

        $credentials = $request->only('password', 'email');

        if(Auth::attempt($credentials))
        {
             return redirect('/menu');
          
        }
        else{
            Session::flash('error','Incorrect username or password.');
            return view('auth.login');
        }
    }
 
    //Logout
    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}