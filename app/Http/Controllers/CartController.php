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
            'quantity' => $request -> quantity,
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
        ->get();       

        return view('auth.viewCart', compact('carts'));
    }

//Delete Cart
public function delete($id){
        $deleteFood=Cart::find($id); //binding record
        $deleteFood->delete();//delete record
        if($deleteFood){
        Session::flash('success','Item was remove successfully!');
        return redirect()->route('viewCart');
        }
    }

    //Confirm Order
    public function confirmOrder(Request $request){

        $orderID = $this->generateOrderID();

        $addOrder = Order::create([
            'orderID' => $orderID,
            'status' => '',
            'amount' => $request -> total,
            'addon' => $request -> addon,
            'waiter' => '',
        ]);

        if($addOrder){
            $carts = Cart::where('table_id',$request -> tableID)->get();
            foreach($carts as $cart){
                $cart -> orderID = $orderID;
                $cart -> save();
            }
            
            return \Redirect::route('receipt',['orderID' => $orderID]);
        }

    }

       //Receipt blade
       public function receipt($orderID){

        $order = Order::where('orderID',$orderID)->first();
        $carts = DB::table('carts')->join('orders','carts.orderID','=','orders.orderID')
        ->join('food','carts.food_id','=','food.id')->select('carts.*','food.name as fName','food.price as fPrice')
        ->where('orders.orderID',$orderID)->get();//zhege meiyong dao le

        return view('pages.receipt',compact('order','carts'));
    }

    public function generateOrderID(){
        $orderID = '';
        for($i = 0; $i < 9; $i++){ $orderID .= mt_rand(0, 9); }
        return $orderID;
    }
}