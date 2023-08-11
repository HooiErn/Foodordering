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
use App\Models\StockList;
use App\Events\Refresh2;
use App\Events\AdminRefresh;
use App\Events\MultipleAddItem;
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
            $check = Cart::where('food_id', $request->food_id)
                ->where('created_at', '>', now()->subSeconds(20))
                ->first();
            
            if($check && $request -> table_id == $check -> table_id){
                event(new MultipleAddItem($request -> table_id));
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
            $table -> selection = null;
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
    public function confirmOrder(Request $request)
    {
        $orderID = $this->generateOrderID();
    
        // Check and update cart quantities based on food stock availability
        $user = Auth::user();
        $carts = $user && $user->isWaiter()
            ? WaiterCart::where('table_id', $request->tableID)->where('orderID', null)->get()
            : Cart::where('table_id', $request->tableID)->where('orderID', null)->get();
    
        $deletedCartItems = $this->checkFoodStockAndCartQuantity($carts);
    
        if (count($deletedCartItems) > 0) {
            // Cart items were deleted, show the user a message
            $message = "The following items were removed from your cart due to insufficient stock: ";
            foreach ($deletedCartItems as $cartItem) {
                $message .= $cartItem->food->name . ", ";
            }
            $message = rtrim($message, ", ");
            Toastr::warning($message, 'Out of stock', ["progressBar" => true, "debug" => true, "newestOnTop" => true, "positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    
        // Create the order
        $addOrder = Order::create([
            'orderID' => $orderID,
            'table_id' => $request->tableID,
            'amount' => $request->total,
            'waiter' => null,
            'status' => 0,
            'payment_method' => $request->payment_method,
            'selection' => $request->selection,
        ]);
    
        if ($addOrder) {
            $table = Table::where('table_id', $request->tableID)->first();
            $table->payment = null;
            $table->selection = null;
            $table->save();
    
            foreach ($carts as $cart) {
                $food = Food::where('id', $cart->food_id)->lockForUpdate()->first();
    
                if ($food->stock !== null) {
                    $food->stock -= $cart->quantity;
                    $food->save();
                    $this->checkAndUpdateAvailability($food);
                    
                    StockList::create([
                        'food_id' => $cart -> food_id,
                        'action' => 3,
                        'quantity' => $cart -> quantity,
                    ]);
                }
    
                $cart->orderID = $orderID;
                $cart->save();
            }
    
            event(new PlaceOrder($table->id, $orderID));
    
            return redirect()->route('viewReceipt', ['id' => $orderID]);
        }
    }
    
    private function checkFoodStockAndCartQuantity($carts)
    {
        $deletedCartItems = [];
    
        foreach ($carts as $cart) {
            $food = Food::where('id', $cart->food_id)->lockForUpdate()->first();
    
            if ($food->stock !== null && $food->stock < $cart->quantity) {
                // If the stock is insufficient, delete the cart
                $cart->delete();
                $deletedCartItems[] = $cart;
            }
        }
    
        return $deletedCartItems;
    }

    
    private function checkAndUpdateAvailability($food){
        if ($food->stock === 0) {
            // Set $food->available to 2
            $food->available = 0;
            // Save the updated $food object to the database (or your data store)
            $food->save();
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