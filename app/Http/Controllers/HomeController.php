<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Table;
use App\Models\Qrcode;
use App\Models\Order;
use Session;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function method($id){
        $table = Table::where('table_id',$id)->first();
        return view('method',compact('table'));
    }
     
    public function index($id, $payment)
    {
        $table = Table::where('table_id',$id)->first();
        $foods = Food::all();
        $carts = Cart::where('table_id',$id)->get();
        $table -> payment = $payment;
        $table -> save();
        return view('home',compact('foods','carts','table'));
    }

    public function view($id){
        $table = Table::where('table_id',$id)->first();

        $details = Cart::leftjoin('food','carts.food_id','=','food.id')
        ->select('carts.*','food.name as name','food.price as price',
        'food.image as image','food.description as description','food.id as foodID')
        ->where('table_id',$id)
        ->get();

        return view('view',compact('details','table'));

    }
    
    public function receipt($id){
        $qrcode = DB::table('qrcodes')->first();
        $order = Order::where('orderID',$id)->first();
        $carts = \DB::table('carts')->join('orders','carts.orderID','=','orders.orderID')
        ->join('food','carts.food_id','=','food.id')->select('carts.*','food.name as fName','food.price as fPrice')
        ->where('orders.orderID',$id)->get(); //if use Cart model, it somehow pass all food in there, regardless if you choose it or not
    
        return view('pages.receipt',compact('qrcode','carts','order'));
    }
    
    public function scanTouchnGo(){
        $qrcode = DB::table('qrcodes')->first();
        
        return view('pages.qrcode',compact('qrcode'));
    }

    public function info(){
        $tables = Table::all();

        return view('info',compact('tables'));
    }
}