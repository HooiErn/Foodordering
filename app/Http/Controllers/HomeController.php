<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Table;
use App\Models\Qrcode;
use App\Models\Order;
use App\Models\Work;
use App\Models\Category;
use App\Events\Refresh;
use App\Events\CallWaiter;
use App\Events\Refresh2;
use Session;
use Carbon\Carbon;
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

     //Admin Login
    public function login(){
        return view('admin/login');
    }

    public function method($id){
 
        $table = Table::where('table_id',$id)->first();

        if(!$table){
            return view('404');
        }

        $work = Work::where('table_id',$id)->where('waiter', null)->get();
        $table -> last_active_at = Carbon::now();
        $table -> save();

        $exists = Qrcode::where('id',1)->exists();
        $value = $exists ? 1 : 2;


        return view('method',compact('table', 'work', 'value'));
    }
     
    public function index(Request $request, $id)
    {
        $table = Table::where('table_id',$id)->first();
        if (!$table) {
            return view('404');
        }
    
        if ($request->filled('payment')) {
            $table->payment = $request->input('payment');
            $table->save();
            event(new Refresh($table->table_id));
        }
    
        $categories = Category::all();
        $foods = Food::all();
        $carts = Cart::leftjoin('food', 'carts.food_id', '=', 'food.id')
        ->select('carts.*','food.price as price')
        ->get();

        $menu = [];

        // Group foods by category
        foreach ($categories as $category) {
            $menu[$category->name] = $foods->where('categoryID', $category->id);
        }
        return view('home', compact('menu', 'carts', 'table','categories'));
        
    }

    public function view($id){
        $table = Table::where('table_id',$id)->first();

        if(!$table){
            return view('404');
        }

        $details = Cart::leftjoin('food','carts.food_id','=','food.id')
        ->select('carts.*','food.name as name','food.price as price',
        'food.image as image','food.id as foodID')
        ->where('table_id',$id)
        ->get();

        return view('view',compact('details','table'));

    }
    
    public function receipt($id){
        $qrcode = DB::table('qrcodes')->first();
        $order = Order::where('orderID',$id)->first();

        if(!$order){
            return view('404');
        }

        $carts = \DB::table('carts')->join('orders','carts.orderID','=','orders.orderID')
        ->join('food','carts.food_id','=','food.id')->select('carts.*','food.name as fName','food.price as fPrice')
        ->where('orders.orderID',$id)->get(); //if use Cart model, it somehow pass all food in there, regardless if you choose it or not
    
        return view('pages.receipt',compact('qrcode','carts','order'));
    }
    
    public function viewReceipt($id){
        $order = Order::where('orderID', $id)->first();
        
        if(!$order){
            return view('404');
        }

        $carts = DB::table('carts')
                ->join('food as detail','carts.food_id','detail.id')
                ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
                ->where('carts.orderID', $order -> orderID)
                ->get();
                
        return view('viewReceipt', compact('order', 'carts'));
    }
    
    public function last_order($id)
    {
        $order = Order::where('table_id', $id)->latest()->first();
    
        if (!$order) {
            return view('404');
        }
    
        $carts = DB::table('carts')
            ->join('food as detail', 'carts.food_id', 'detail.id')
            ->select('carts.*', 'detail.name as name', 'detail.image as image', 'detail.price as price')
            ->where('carts.orderID', $order->orderID);
    
        $waiterCarts = DB::table('waiter_carts')
            ->join('food as detail', 'waiter_carts.food_id', 'detail.id')
            ->select('waiter_carts.*', 'detail.name as name', 'detail.image as image', 'detail.price as price')
            ->where('waiter_carts.orderID', $order->orderID);
    
        $carts = $carts->union($waiterCarts)->get();
    
        return view('lastOrder', compact('order', 'carts'));
    }

    
    public function scanTouchnGo(){
        $qrcode = DB::table('qrcodes')->first();
        
        return view('pages.qrcode',compact('qrcode'));
    }

    public function info(){
        $tables = Table::all();

        return view('info',compact('tables'));
    }
    
    public function callWaiter(Request $request){
        $addWork = Work::create([
            'table_id' => $request -> table_id,
            'waiter' => null,
            'work_number' => 1,
        ]);
        
        event(new CallWaiter($request -> table_id));
        Toastr::info('Waiter is coming on their way.', 'Called Waiter Successfully', ["newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return back();
    }
    
    public function changePayment(Request $request){
        $table = Table::where('table_id', $request -> table_id)->first();
        $table -> payment = null;
        $table -> save();
        
        $work = Work::where('table_id',$table -> table_id)->where('waiter', null)->get();
        return redirect()->action(
            [HomeController::class,'method'],['id' => $request -> table_id]
        );
        
    }
    
    public function refresh(){
        event(new Refresh2());
    }

    // public function unloadLogout(){
    //     $user = Auth::user();
    //     $user->session_id = null;
    //     $user->save();
    //     Auth::logout();
    // }
    
    public function lastActive($id){
        $table = Table::where('table_id',$id)->first();
        
        if($table -> last_active_at == null){
            $table -> last_active_at = Carbon::now();
            $table -> save();
        }
        
        return response->json([
            ''  
        ]);
    }
}