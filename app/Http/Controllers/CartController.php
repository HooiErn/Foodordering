<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PlaceOrder;
use App\Events\Refresh;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Table;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;
use App\Events\Refresh2;
use Carbon\Carbon;
use Session;
use DB;

class CartController extends Controller
{
    //Add to Cart
    public function addCart(Request $request){
        
        $cart = new Cart();
        $cart->food_id = $request->food_id;
        $cart->table_id = $request->table_id;
        $cart->quantity = $request->quantity;
        $cart->save();
        
        Table::where('table_id', $request->table_id)->update(['last_active_at' => Carbon::now()]);

        event(new Refresh($request -> table_id));
        if(session()->has('waiterData')){
            return redirect()->back();
        }
        else{
            return redirect()->route('home', ['id' => $request -> table_id]);
        }
    }
    
    public function onUnload(Request $request)
    {
        $table_id = $request->table_id;

        // Check if the user was the last active user
        $last_active_at = Table::where('table_id', $table_id)
            ->max('last_active_at');
    
        // Calculate the elapsed time since the user was last active
        $elapsed_time = Carbon::now()->diffInMinutes($last_active_at);
    
        if ($elapsed_time > 3) {
            // User was the last active user, delete their cart
            Cart::where('table_id', $table_id)->where('orderID', null)->delete();
            $table = Table::where('table_id',$table_id)->first();
            $table -> payment = null;
            $table -> save();
            event(new Refresh($table_id));
        }
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
        event(new Refresh($deleteFood -> table_id));
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
                'status' => 0,
                'waiter' => $waiterName,
                'done_prepare_at' => Carbon::now(),
                'serve_time' => Carbon::now(),
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
                'status' => 0,
                'waiter' => null,
                'done_prepare_at' => Carbon::now(),
                'serve_time' => Carbon::now(),
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
                event(new Refresh2());
                return back();
            }
            else{
                event(new PlaceOrder($table -> id, $orderID));
                return redirect()->route('viewReceipt', ['id' => $orderID]);
            }
        
        }

    }
    
    public function food_detail($id, $table_id){
        $food = Food::where('id', $id)->first();
        $table = Table::where('table_id', $table_id)->first();
        
        return view('food-detail', compact('food', 'table'));
    }

    public function generateOrderID(){
        $orderID = '';
        for($i = 0; $i < 9; $i++){ $orderID .= mt_rand(0, 9); }
        return $orderID;
    }
}