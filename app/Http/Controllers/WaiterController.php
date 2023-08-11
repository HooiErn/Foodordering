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
use App\Events\WaiterResponse;
use Session;
use Carbon\Carbon;
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
    
    public function onload(Request $request){
        $table_id = $request -> table_id;
        
        WaiterCart::where('table_id', $table_id)->where('orderID', null)->delete();
        
        return response()->json([
            'message' => "Onload Function Success",
        ]);
    }
    
    public function orderDetail(){
        $orders = Order::all();
        
        // Load carts using Eloquent relationships
        $item1 = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $item2 = DB::table('waiter_carts')
        ->join('food as detail','waiter_carts.food_id','detail.id')
        ->select('waiter_carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $carts = $item1 -> merge($item2);
        
        $qrcode = DB::table('qrcodes')->first();
        
        $msg = null;
        
        return view('waiter/orderDetail', compact('orders', 'carts', 'qrcode'))->with('msg',$msg);
    }
    
    public function takeOrder(Request $request)
    {
        $orderIDs = $request->input('orderID');
    
        $orders = Order::whereIn('orderID', $orderIDs)->get();
    
        if ($orders->isEmpty()) {
            return view('404');
        }
    
        $item1 = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $item2 = DB::table('waiter_carts')
        ->join('food as detail','waiter_carts.food_id','detail.id')
        ->select('waiter_carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $carts = $item1 -> merge($item2);
    
        $qrcode = DB::table('qrcodes')->first();
    
        // Check if any orders have already been taken
        $msg = [];
    
        foreach ($orders as $order) {
            if ($order->waiter !== null) {
                $msg[$order->orderID] = "This order has been taken";
                $msg2[$order->orderID] = "这订单已被拿取";
            } else {
                $waiter = Auth::user()->name;
                $serveTime = Carbon::now();
    
                Order::where('orderID', $order->orderID)->update([
                    'waiter' => $waiter,
                    'serve_time' => $serveTime,
                ]);
    
                event(new AdminRefresh());
    
                $msg[$order->orderID] = "Successfully Take Order";
                $msg2[$order->orderID] = "成功拿取订单";
            }
        }
    
        return view('waiter/orderDetail', compact('orders', 'carts', 'qrcode', 'msg', 'msg2'));
    }


    
    public function viewTakenOrder(Request $request)
    {
        $waiter = User::where('name',Auth::user()->name)->first();
        $orders = Order::where('waiter',Auth::user()->name)->whereDate('created_at', now()->toDateString())->get();

        return view('waiter.viewOrder',compact('waiter','orders'));
    }
    
    public function searchDate(Request $request){
        $waiter = User::where('name', Auth::user()->name)->first();
        $orders = Order::where('created_at','>=',$request -> from)->where('created_at','<=',$request -> to)->where('waiter',$waiter -> name)->get();
        
        return view('waiter.viewOrder', compact('waiter', 'orders'));
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
        
        event(new WaiterResponse($work -> table_id));
        return back();
        
    }
    
    public function showWork(){
        $tables = Table::all();
        $works = Work::where('waiter', Auth::user()->name)->get();
        
        return view('waiter/showWork',compact('works','tables'));
    }

}