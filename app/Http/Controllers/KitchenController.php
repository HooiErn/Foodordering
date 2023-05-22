<?php

namespace App\Http\Controllers;

use DB;
use Cookie;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Qrcode;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\Table;
use App\Models\Work;
use App\Models\Action;
use App\Models\Category;
use App\Models\FoodOption;
use App\Models\FoodSelect;
use App\Events\AddToCart;
use App\Events\AdminRefresh;
use App\Events\WaiterRefresh;
use App\Events\MenuRefresh;
use App\Events\DonePrepare;
use App\Events\Refresh2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class KitchenController extends Controller
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
    
    // Show Food
    public function food(){
        $foods = Food::all();
        
        return view('kitchen/food', compact('foods'));
    }

    //Change Food Status
    public function changeStatus($id){
        $food = Food::where('id',$id)->first();
        if($food -> available > 0){
            $food -> available = 0;
            $food -> save();
            event(new MenuRefresh());
            return redirect('kitchen/food');
        }
        else{
            $food -> available = 1;
            $food -> save();
            event(new MenuRefresh());
            return redirect('kitchen/food');
        }
    }
    
    public function takenOrder(){
        $orders = Order::all();
        $item1 = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $item2 = DB::table('waiter_carts')
        ->join('food as detail','waiter_carts.food_id','detail.id')
        ->select('waiter_carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $carts = $item1 -> merge($item2);
        
        return view('kitchen/takenOrder', compact('orders', 'carts'));
        
    }
    
    public function donePreparing($id){
        $order = Order::where('id', $id)->first();
        event(new DonePrepare($order -> table_id));
        event(new AdminRefresh());
        $order -> done_prepare_at = Carbon::now();
        $order -> status = 1;
        $order -> save();
        
        return redirect()->back();
    }
}
