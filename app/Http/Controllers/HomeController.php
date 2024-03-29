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
use Cookie;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;

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
    public function login_form()
    {
        return view('login-form');
    }
    
    // Check Login
    public function check_login(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('name', 'password');
    
        $user = User::where('name', $request->name)->first();

        if ($user && $user->deleted == 2) {
            Toastr::error('Your account has been deleted', 'Error', ["progressBar" => true, "debug" => true, "newestOnTop" => true, "positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($request->has('rememberme')){
                Cookie::queue('name',$request->name,1440); //1440 means it stays for 24 hours
                Cookie::queue('password',$request->password,1440);
            }
            else{
                Cookie::queue(Cookie::forget('name'));
                Cookie::queue(Cookie::forget('password'));
            }
    
            if ($user->isAdmin()) {
                Toastr::success('Welcome back '.$request->name, 'Login Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" => true, "positionClass" => "toast-top-right"]);
                return redirect('admin/food');
            } elseif ($user->isWaiter()) {
                Toastr::success('Welcome back '.$request->name, 'Login Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" => true, "positionClass" => "toast-top-right"]);
                return redirect('waiter/work');
            } elseif ($user->isKitchen()) {
                Toastr::success('Welcome back '.$request->name, 'Login Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" => true, "positionClass" => "toast-top-right"]);
                return redirect('kitchen/takenOrder');
            }
    
            return redirect()->back();
        }
    
        Toastr::error('Invalid name or password', 'Error');
        return redirect()->back()->withErrors($validator)->withInput();
    }
    
    // Logout
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        Toastr::info('You have logged out of your account', 'Logout Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" => true, "positionClass" => "toast-top-right"]);
        return redirect('/');
    }

    public function method($id,){
 
        $table = Table::where('table_id',$id)->first();

        if(!$table){
            return view('404');
        }

        $work = Work::where('table_id',$id)->where('waiter', null)->get();
        $table -> last_active_at = Carbon::now();
        $table -> save();

        $exists = Qrcode::count() > 0;
        $value = $exists ? 1 : 2;


        return view('method',compact('table', 'work', 'value'));
    }
     
    public function index(Request $request, $id)
    {
        $table = Table::where('table_id',$id)->first();
        if (!$table) {
            return view('404');
        }
    
        if ($request->filled('payment') && $request -> filled('selection')) {
            $table->payment = $request->input('payment');
            $table->selection = $request -> input('selection');
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

        $carts = DB::table('carts')
                ->join('food as detail','carts.food_id','detail.id')
                ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
                ->where('carts.orderID', $order -> orderID)
                ->get();
    
        return view('pages.receipt',compact('qrcode','carts','order'));
    }
    
    public function viewReceipt($id){
        $order = Order::where('orderID', $id)->first();
        
        if(!$order){
            return view('404');
        }
                
        $item1 = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->where('carts.orderID', $order -> orderID)
        ->get();

        $item2 = DB::table('waiter_carts')
        ->join('food as detail','waiter_carts.food_id','detail.id')
        ->select('waiter_carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->where('waiter_carts.orderID', $order -> orderID)
        ->get();

        $carts = $item1 -> merge($item2);
                
        return view('viewReceipt', compact('order', 'carts'));
    }
    
    public function last_order($id)
    {
        $orders = Order::where('table_id', $id)
                        ->latest()
                        ->take(3)
                        ->get();
    
        if ($orders->isEmpty()) {
            return view('404');
        }
    
        $orderIds = $orders->pluck('orderID');
    
        $orderData = [];
    
        foreach ($orderIds as $orderId) {
            $order = Order::where('orderID', $orderId)->first();
    
            $carts = DB::table('carts')
                ->join('food as detail', 'carts.food_id', 'detail.id')
                ->select('carts.*', 'detail.name as name', 'detail.image as image', 'detail.price as price')
                ->where('carts.orderID', $orderId)
                ->get();
    
            $waiterCarts = DB::table('waiter_carts')
                ->join('food as detail', 'waiter_carts.food_id', 'detail.id')
                ->select('waiter_carts.*', 'detail.name as name', 'detail.image as image', 'detail.price as price')
                ->where('waiter_carts.orderID', $orderId)
                ->get();
    
            $orderData[] = [
                'order' => $order,
                'carts' => $carts,
                'waiterCarts' => $waiterCarts,
            ];
        }
    
        return view('lastOrder', compact('orderData'));
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
    
    public function print(){
        $connector = new NetworkPrintConnector("192.168.1.5", 9100);
        $printer = new Printer($connector);
        
        if($printer){
            Toastr::success("Yes","Got Printer");
            
            $printer->text("Hello, World!\n");
            $printer->cut();
            $printer->close();
        }
        else{
            Toastr::error("No","No Printer");
        }

        return redirect()->back();
    }
}