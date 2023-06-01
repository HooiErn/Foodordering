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
use App\Models\FoodOption;
use App\Models\FoodSelect;
use App\Models\WaiterCart;
use App\Events\Refresh2;
use App\Events\AdminRefresh;
use Carbon\Carbon;
use Session;
use DB;

class CartController extends Controller
{
    //Add to Cart
    public function addCart(Request $request){

        Table::where('table_id', $request->table_id)->update(['last_active_at' => Carbon::now()]);

        if(Auth::check() && Auth::user()->isWaiter()){
            $cart = new WaiterCart();
            $cart->food_id = $request->food_id;
            $cart->table_id = $request->table_id;
            $cart->quantity = $request->quantity;
            $cart->save();

            return redirect()->back();
        }
        else{
            $cart = new Cart();
            $cart->food_id = $request->food_id;
            $cart->table_id = $request->table_id;
            $cart->quantity = $request->quantity;


            if($request -> has('select') && $request -> has('option')){
                $selects = $request->select;
                $options = $request->option;

                $selectOptionArray = [];
                foreach ($selects as $selectId => $selectName) {
                    $optionName = isset($options[$selectId]) ? $options[$selectId] : null;
                    $selectOptionArray[$selectName] = $optionName;
                }
                $jsonSelectOptions = json_encode($selectOptionArray);
                $cart->addon = $jsonSelectOptions;
            }
            $cart->save();

            event(new Refresh($request -> table_id));
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
            $table = Table::where('table_id',$table_id)->first();
            $table -> payment = null;
            $table -> last_active_at = null;
            $table -> save();
            Cart::where('table_id', $table_id)->where('orderID', null)->delete();
            event(new Refresh($table_id));
            return response()->json([
                'message' => "Unload Function Success",
            ]);
        }
    }

    //View Cart
    public function view(){
        $carts=DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
                ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
                ->where('carts.orderID', $order -> orderID)
                ->get();    

        return view('auth.viewCart', compact('carts'));
    }

    //Delete Cart
    public function deleteCart($id){
        if(Auth::check() && Auth::user()->isWaiter()){
            $deleteFood=WaiterCart::find($id); //binding record
            $deleteFood -> delete();
            
            return back();
        }
        
        $deleteFood=Cart::find($id);
        event(new Refresh($deleteFood -> table_id));
        $deleteFood->delete();//delete record
        return back();
    }

    //Confirm Order
    public function confirmOrder(Request $request){
        $orderID = $this->generateOrderID();
        
        if(Auth::check() && Auth::user()->isWaiter()){
            $addOrder = Order::create([
                'orderID' => $orderID,
                'table_id' => $request -> tableID,
                'amount' => $request -> total,
                'waiter' => Auth::user()->name,
                'status' => 0,
                'payment_method' => $request -> payment_method,
            ]);
            
            if($addOrder){
                $carts = WaiterCart::where('table_id', $request -> tableID)->where('orderID',null)->get();
                foreach($carts as $cart){
                    $cart -> orderID = $orderID;
                    $cart -> save();
                }
                event(new PlaceOrder($request -> tableID, $orderID));
                
                return redirect()->back();
            }
        }
        
        $addOrder = Order::create([
            'orderID' => $orderID,
            'table_id' => $request -> tableID,
            'amount' => $request -> total,
            'waiter' => null,
            'status' => 0,
            'payment_method' => $request -> payment_method,
        ]);
    
        if($addOrder){
            $table = Table::where('table_id',$request->tableID)->first();
            $table->payment = null;
            $table->save();
            
            $carts = Cart::where('table_id', $request -> tableID)->where('orderID',null)->get();
            foreach($carts as $cart){
                $cart -> orderID = $orderID;
                $cart -> save();
            }
    
            event(new PlaceOrder($table->id, $orderID));
            
            return redirect()->route('viewReceipt', ['id' => $orderID]);
        }
    }
    
    
    public function food_detail($id, $table_id){
        $food = Food::where('id', $id)->first();
        $table = Table::where('table_id', $table_id)->first();
        
        if(!($food && $table)){
            return view('404');
        }

        return view('food-detail', compact('food', 'table'));
    }

    public function generateOrderID(){
        $orderID = '';
        $isUnique = false;
        
        while (!$isUnique) {
            // Generate a new order ID
            for ($i = 0; $i < 9; $i++) {
                $orderID .= mt_rand(0, 9);
            }
            
            // Check if the order ID already exists in the database
            $existingOrder = Order::where('orderID', $orderID)->first();
            
            if (!$existingOrder) {
                // The order ID is unique, break out of the loop
                $isUnique = true;
            } else {
                // The order ID already exists, regenerate a new one
                $orderID = '';
            }
        }
        
        return $orderID;
    }
}