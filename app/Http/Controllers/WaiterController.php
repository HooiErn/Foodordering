<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Food;
use App\Models\Table;
use App\Models\Waiter;
use App\Models\Order;
use Session;
use Cookie;
use DB;

class WaiterController extends Controller
{
    //Login
    public function login(){
        return view('waiter/login');
    }

    //Check Login
    public function check_login(Request $request){

        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $waiter = Waiter::where(['name' => $request->name, 'password' => sha1($request->password)])->count();

        if($request->has('rememberme')){
            Cookie::queue('name',$request->name,1440); //1440 means it stays for 24 hours
            Cookie::queue('password',$request->password,1440);
        }

        if($waiter > 0){
            $waiterData = Waiter::where(['name' => $request->name, 'password' => sha1($request->password)])->get();
            session(['waiterData' => $waiterData]);
            Toastr::success('Welcome back '.$request -> name, 'Login Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('waiter/scan');
        }
        else{
            Toastr::error('Please try again', 'Invalid name / password', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('waiter/login');
        }
    }

    //Logout
    public function logout(){
        session()->forget(['waiterData']);
        Toastr::info('You have logout your account', 'Logout Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect('waiter/login');
    }

    //Scan
    public function scan(){
        return view('waiter/scan');
    }

    //After Scan Take Order
    public function takeOrder(Request $request){
        $order = Order::where('orderID',$request -> orderID)->first();
        $data = Session::get('waiterData');
        $waiterName = $data[0] -> name;

        if($order -> waiter == null){
            $order -> waiter = $waiterName;
            $order -> save();

            $output = "Successfully Take Order";
            return response($output);
        }
        else{
            $output = "This order has been taken.";
            return response($output);
        }
        
        
    }
}