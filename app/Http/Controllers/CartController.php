<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Table;
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
public function deleteCart($id){
        $deleteFood=Cart::find($id); //binding record
        $deleteFood->delete();//delete record
        if($deleteFood){
        Session::flash('success','Item was remove successfully!');
       
        
        return back();
        }
    }

   //Confirm Order
public function confirmOrder(Request $request){

        $orderID = $this->generateOrderID();
        $waiterData = Session::get('waiterData');

        //If session waiterData exists, automatically add waiter name to the order
        if(Session::has('waiterData'))
        {
            $waiterName = $waiterData[0] -> name;

            $addOrder = Order::create([
                'orderID' => $orderID,
                'table_id' => $request -> tableID,
                'amount' => $request -> total,
                'addon' => $request -> addon,
                'is_paid' => 0,
                'waiter' => $waiterName,
                'payment_method' => $request -> paymentMethod,
            ]);
        }
        else
        {
            $addOrder = Order::create([
                'orderID' => $orderID,
                'table_id' => $request -> tableID,
                'amount' => $request -> total,
                'addon' => $request -> addon,
                'is_paid' => 0,
                'waiter' => null,
                'payment_method' => $request -> paymentMethod,
            ]);
        }

        if($addOrder){
            $carts = Cart::where('table_id',$request -> tableID)->where('orderID',null)->get();
            $table = Table::where('table_id',$request -> tableID)-> first();
            $table -> payment = null;
            $table -> save();
            foreach($carts as $cart){
                $cart -> orderID = $orderID;
                $cart -> save();
            }
            if(Session::has('waiterData')){
                return back();
            }
            else{
                return \Redirect::route('receipt',['id' => $orderID]);
            }
            
        }

    }

    public function generateOrderID(){
        $orderID = '';
        for($i = 0; $i < 9; $i++){ $orderID .= mt_rand(0, 9); }
        return $orderID;
    }
}