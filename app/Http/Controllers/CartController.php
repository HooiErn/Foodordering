<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;
use Session;
use DB;

class CartController extends Controller
{
    //Add to Cart
    public function addCart(Request $request){
        
        $addFoodCart=Cart::Create([
            'food_id'=>$request->food_id,
            'table_id' => $request -> table_id,
            'orderID'=>'',
            'is_paid' => 0,
        ]);

        Session::flash('msg', 'You have success add this item to your cart. You can confirm your order later.');
        return redirect()->back();
    }

    //View Cart
    public function view(){
        $carts=DB::table('carts')
        ->leftjoin('food','food.id','=','carts.food_id')
        ->select('carts.quantity as cartQTY','carts.id as cid','food.*')
        ->where('carts.orderID','=','')
        ->where('carts.userID','=',Auth::id()) 
        ->get();       

        return view('auth.viewCart', compact('carts'));
    }

    //Delete Cart
    public function deleteCart($id){
        $cart = Cart::where('id',$id)->first();
        $cart -> delete();

        return redirect('viewCart');
    }

    //Confirm Order
    public function confirmOrder(Request $request){

        $carts = Cart::where('id',$request -> cartID)->update(['quantity' => $request -> quantity]);

        $addOrder = Order::create([
            'status' => '',
            'amount' => $request -> total,
            'addon' => $request -> addon,
            'waiter' => '',
        ]);

        return back();
    }
}