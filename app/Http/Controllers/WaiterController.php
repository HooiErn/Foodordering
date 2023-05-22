<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;
use App\Models\Table;
use App\Models\Order;
use App\Models\WaiterCart;
use App\Models\Cart;
use App\Models\Work;
use App\Models\Qrcode;
use App\Models\User;
use App\Events\AdminRefresh;
use App\Events\Refresh2;
use Carbon\Carbon;
use Session;
use Cookie;
use DB;

class WaiterController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check()) {
                return redirect()->route('login.form');
            }
            return $next($request);
        });
    }

    //Scan
    public function scan(){
        return view('waiter/scan');
    }
    
    public function orderDetail($id){
        $order = Order::where('orderID', $id)->first();
        
        if(!$order){
            return view('404');
        }

        // Load carts using Eloquent relationships
        $carts = DB::table('carts')
                ->join('food as detail','carts.food_id','detail.id')
                ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
                ->where('carts.orderID', $order -> orderID)
                ->get();
        
        $qrcode = DB::table('qrcodes')->first();
        
        if($order -> waiter == null){
            $order->waiter = Auth::user()->name;
            $order->serve_time = Carbon::now();
            $order->save();
    
            $msg = "Successfully Take Order";
            event(new AdminRefresh());
            return view('waiter/orderDetail', compact('order', 'carts', 'qrcode'))->with('msg', $msg); 
        }
        else{
            $msg = "This order has been taken";
            return view('waiter/orderDetail', compact('order', 'carts', 'qrcode'))->with('msg', $msg); 
        }
        
    }
    
    public function viewTakenOrder(Request $request)
    {
        $waiter = User::where('name',Auth::user()->name)->first();
        $orders = Order::where('waiter',Auth::user()->name)->get();

        return view('waiter.viewOrder',compact('waiter','orders'));
    }
    
    public function searchDate(Request $request){
        $waiter = User::where('name',Auth::user()->name)->first();
        $orders = Order::where('created_at','>=',$request -> from)->where('created_at','<=',$request -> to)->where('waiter',$waiterName)->get();
        
        return view('waiter.viewOrder',compact('waiter','orders'));
    }
    
    public function viewFoodlist($orderID)
    {
        $order = Order::where('orderID',$orderID)->first();
        
        if(!$order){
            return view('404');
        }

        $item1 = DB::table('carts')->join('orders','carts.orderID','=','orders.orderID')
        ->join('food','carts.food_id','=','food.id')->select('carts.*','food.name as fName','food.price as fPrice')
        ->where('orders.orderID',$orderID)->get();

        $item2 = DB::table('waiter_carts')->join('orders','waiter_carts.orderID','=','orders.orderID')
        ->join('food','waiter_carts.food_id','=','food.id')->select('waiter_carts.*','food.name as fName','food.price as fPrice')
        ->where('orders.orderID',$orderID)->get();

        $carts = $item1 -> merge($item2);

        return view('waiter.viewFoodList',compact('order','carts'));
    }
    
    public function placeOrder(){
        $tables = Table::all();
        return view('waiter/placeOrder',compact('tables'));
    }
    
    public function addToCart($id){
        $table = Table::where('table_id',$id)->first();
        $foods = Food::all();
        $carts = WaiterCart::leftjoin('food','waiter_carts.food_id','=','food.id')
        ->select('waiter_carts.*','food.name as fName', 'food.price as fPrice', 'food.image as fImage')
        ->where('table_id',$id)->where('orderID',null)->get();

        return view('waiter/add-to-cart', compact('table','foods','carts'));
    }
    
    public function work(){
        $works = Work::all();
        $orders = Order::where('status', 1)->get();
        $item1 = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $item2 = DB::table('waiter_carts')
        ->join('food as detail','waiter_carts.food_id','detail.id')
        ->select('waiter_carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $carts = $item1 -> merge($item2);
        return view('waiter/work',compact('works', 'orders', 'carts'));
    }
    
    public function acceptWork($id){
        $waiter = User::where('name', Auth::user()->name)->first();
        $waiter -> count += 1;
        $work = Work::where('id',$id)->first();
        $work -> waiter = Auth::user()->name;
        $work -> save();
        
        event(new Refresh2());
        return back();
        
    }
    
    public function showWork(){
        $tables = Table::all();
        $works = Work::where('waiter', Auth::user()->name)->get();
        
        return view('waiter/showWork',compact('works','tables'));
    }

}