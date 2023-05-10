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
        $waiter = Auth::check() && Auth::user()->isWaiter() ? Auth::user()->name : null;
        $addOrder = $this->createOrder($orderID, $request->tableID, $request->total, $request->addon, $waiter, $request->payment_method);
    
        if($addOrder){
            $table = Table::where('table_id',$request->tableID)->first();
            $table->payment = null;
            $table->save();
            
            $cartModel = $waiter ? WaiterCart::class : Cart::class;
            $carts = $cartModel::where('table_id', $request->tableID)->where('orderID', null)->get();
            $this->updateCartItems($carts, $orderID, $cartModel);
    
            event(new PlaceOrder($table->id, $orderID));
        }
    
        if ($waiter) {
            return redirect()->back();
        } else {
            return redirect()->route('viewReceipt', ['id' => $orderID]);
        }
    }
    
    private function createOrder($orderID, $tableID, $total, $addon, $waiter, $paymentMethod) {
        return Order::create([
            'orderID' => $orderID,
            'table_id' => $tableID,
            'amount' => $total,
            'addon' => $addon,
            'status' => 0,
            'waiter' => $waiter,
            'done_prepare_at' => Carbon::now(),
            'serve_time' => Carbon::now(),
            'payment_method' => $paymentMethod,
        ]);
    }
    
    private function updateCartItems($carts, $orderID, $cartModel) {
        foreach ($carts as $cart) {
            $cart->orderID = $orderID;
            $cart->save();
    
            // Create WaiterCart if user is a waiter
            if ($cartModel == WaiterCart::class) {
                WaiterCart::create([
                    'table_id' => $cart->table_id,
                    'food_id' => $cart->food_id,
                    'quantity' => $cart->quantity,
                    'addons' => $cart->addons,
                    'orderID' => $orderID,
                ]);
            }
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
        for($i = 0; $i < 9; $i++){ $orderID .= mt_rand(0, 9); }
        return $orderID;
    }
}