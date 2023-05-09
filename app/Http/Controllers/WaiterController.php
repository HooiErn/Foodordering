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
use App\Models\Cart;
use App\Models\Work;
use App\Models\Qrcode;
use App\Events\Refresh2;
use Carbon\Carbon;
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
            $waiterData = Waiter::where(['name' => $request->name, 'password' => sha1($request->password)])->first();
            session(['waiterData' => $waiterData]);
            Toastr::success('Welcome back '.$request -> name, 'Login Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('waiter/work');
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

    // public function takeOrder(Request $request){
    //     $order = Order::where('orderID', $request -> orderID)->first();
    //     if ($order->waiter != null) {
    //         Toastr::info('This order has been taken by another waiter', 'Failed To Take Order', ["progressBar" => true, "debug" => true, "newestOnTop" => true, "positionClass" => "toast-top-right"]);
    //         return redirect()->back();
    //     }
        
    //     $order->waiter = session('waiterData')['name'];
    //     $order->serve_time = Carbon::now();
    //     $order->save();
        
    //     // Load carts using Eloquent relationships
    //     $carts = DB::table('carts')
    //             ->join('food as detail','carts.food_id','detail.id')
    //             ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
    //             ->where('carts.orderID', $order -> orderID)
    //             ->get();
        
    //     // Broadcast event to update kitchen page
    //     event(new Refresh2());
        
    //     Toastr::success('Successfully Take Order', 'Success To Take Order', ["progressBar" => true, "debug" => true, "newestOnTop" => true, "positionClass" => "toast-top-right"]);
    //     return view('waiter/orderDetail')->with(['order' => $order, 'carts' => $carts]);
    // }
    
    public function orderDetail($id){
        $order = Order::where('orderID', $id)->first();
        
        // Load carts using Eloquent relationships
        $carts = DB::table('carts')
                ->join('food as detail','carts.food_id','detail.id')
                ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
                ->where('carts.orderID', $order -> orderID)
                ->get();
        
        $qrcode = DB::table('qrcodes')->first();
        
        if($order -> waiter == null){
            $order->waiter = session('waiterData')['name'];
            $order->serve_time = Carbon::now();
            $order->save();
    
            $msg = "Successfully Take Order";
            return view('waiter/orderDetail', compact('order', 'carts', 'qrcode'))->with('msg', $msg); 
        }
        else{
            $msg = "This order has been taken";
            return view('waiter/orderDetail', compact('order', 'carts', 'qrcode'))->with('msg', $msg); 
        }
        
    }
    
    public function viewTakenOrder(Request $request)
    {
        $waiterName = session('waiterData')['name'];
        $waiter = Waiter::where('name',$waiterName)->first();
        $orders = Order::where('waiter',$waiterName)->get();

        return view('waiter.viewOrder',compact('waiter','orders'));
    }
    
    public function searchDate(Request $request){
        $waiterName = session('waiterData')['name'];
        $waiter = Waiter::where('name',$waiterName)->first();
        $orders = Order::where('created_at','>=',$request -> from)->where('created_at','<=',$request -> to)->where('waiter',$waiterName)->get();
        
        return view('waiter.viewOrder',compact('waiter','orders'));
    }
    
    public function viewFoodlist($orderID)
    {
        $order = Order::where('orderID',$orderID)->first();
        $carts = DB::table('carts')->join('orders','carts.orderID','=','orders.orderID')
        ->join('food','carts.food_id','=','food.id')->select('carts.*','food.name as fName','food.price as fPrice')
        ->where('orders.orderID',$orderID)->get();

        return view('waiter.viewFoodList',compact('order','carts'));
    }
    
    public function placeOrder(){
        $tables = Table::all();
        return view('waiter/placeOrder',compact('tables'));
    }
    
    public function addToCart($id){
        $table = Table::where('table_id',$id)->first();
        $foods = Food::all();
        $carts = Cart::leftjoin('food','carts.food_id','=','food.id')
        ->select('carts.*','food.name as fName', 'food.price as fPrice', 'food.image as fImage', 'food.description as fDescription')
        ->where('table_id',$id)->where('orderID',null)->get();

        return view('waiter/add-to-cart', compact('table','foods','carts'));
    }
    
    public function work(){
        $works = Work::all();
        $orders = Order::where('status', 1)->get();
        $carts = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();
        return view('waiter/work',compact('works', 'orders', 'carts'));
    }
    
    public function acceptWork($id){
        $waiterName = session('waiterData')['name'];
        $waiter = Waiter::where('name', $waiterName)->first();
        $waiter -> count += 1;
        $work = Work::where('id',$id)->first();
        $work -> waiter = $waiterName;
        $work -> save();
        
        event(new Refresh2());
        return back();
        
    }
    
    public function showWork(){
        $waiterName = session('waiterData')['name'];
        $tables = Table::all();
        $works = Work::where('waiter', $waiterName)->get();
        
        return view('waiter/showWork',compact('works','tables'));
    }

}