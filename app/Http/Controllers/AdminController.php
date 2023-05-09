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
use App\Events\DonePrepare;
use App\Events\Refresh2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check()) {
                return redirect()->route('admin.login');
            }
            return $next($request);
        })->except(['check_login']);
    }

    //Check Login
    public function check_login(Request $request){
        $validator = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('name', 'password');
    
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            
            // Allow 1 account login only (but got bug)
            // if ($user->session_id !== null && $user->session_id !== session()->getId()) {
            //     Toastr::error('You are already logged in on another device.', 'Login Failed');
            //     Auth::logout();
            //     return redirect('admin/login');
            // }
    
            // Update the user's session ID in the database
            $user->session_id = session()->getId();
            $user->save();

            if($user -> isAdmin()){
                Toastr::success('Welcome back '.$request->name, 'Login Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('admin/takenOrder');
            }
            else if($user -> isWaiter()){
                Auth::logout();
                Toastr::info('That page is for admin.', 'Login Wrong Page', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('waiter/login');
            }

            return redirect()->back();            
        }

        Toastr::error('Invalid name or password', 'Error');
        return redirect()->back()->withErrors($validator)->withInput();
    }

    //Logout
    public function logout(){
        $user = Auth::user();
        $user -> session_id == null;
        $user ->save();
        
        Auth::logout();
        Toastr::info('You have logout your account', 'Logout Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect('admin/login');
    }

    //Dashboard
    public function index(){
        $data = Order::all();
        return view('admin/dashboard',compact("data"));
    }
    
    // Action List
    public function actionList(){
        $admins = User::where('role',1)->get();
        $actions = Action::all();
        return view('admin/action-list', compact('admins','actions'));
    }
    
    // Create Sub Account
    public function addSubAccount(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name',
            'password' => 'required|min:8|max:12',
            'confirm_password' => 'required|same:password',
        ]);
        
        if($validator -> fails()){
            Toastr::error('Invalid Input','Validate Failed');
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $addSubAcc = User::create([
            'name' => $request -> name,
            'role' => 1,
            'password' => Hash::make($request -> password),
        ]);
        
        Action::action(Auth::user()->name, "Add sub account - " . $request -> name);
        Toastr::success('You have successfully create a sub account.', 'Success', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect()->back();
        
    }
    
    public function deleteSubAccount($id){
        $user = User::where('id',$id)->first();
        Action::action(Auth::user()->name, "Delete sub account - " . $user -> name);
        $user -> delete();

        Toastr::success('You have successfully delete a sub account.', 'Success', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }

    //Food
    public function food(){
        $categories = Category::all();
        $foods = Food::all();
        return view('admin/food', compact('categories','foods'));
    }

    //Add Category
    public function addCategory(Request $request){

        $validator = Validator::make($request->all(), [
            'c_name' => 'unique:categories,name',
        ]);

        if ($validator->fails()) {
            Toastr::error('This category name already exists. Please try again.', 'Error', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::create([
            'name' => $request -> c_name,
        ]);

        Toastr::success('A new category has been added', 'Add Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect('admin/food');
    }

    //Update Category
    public function updateCategory(Request $request){
        if (Category::where('name', $request->name)->exists()) {
            Toastr::error('This category name already exists. Please try again.', 'Repeat name', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect()->back()->withInput()->withErrors(['edit_c_name' => 'Duplicate name has been used.']);
        }
        
        $category = Category::where('id',$request -> catID)->first();

        $category -> name = $request -> name;
        $category -> save();

        Toastr::success('Category name has been changed', 'Update Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect('admin/food');
    }

    //Delete Category
    public function deleteCategory($id){
        $category = Category::where('id',$id)->first();
        $foods = Food::where('categoryID',$category -> id)->get();

        foreach($foods as $food){
            $food -> delete();
        }
        $category -> delete();

        Toastr::success('You Successfully Deleted a Category', 'Category Deleted', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect('admin/food');
    }

    //Add Food
    public function addFood(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'foodImage' => 'required',
            'available' => 'required',
            'price' => 'required',
            'categoryID' => 'required',
        ]);

        if($validator -> fails()){
            Toastr::error('Something went wrong. <br> Please try again', 'Error', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food'); 
        }
        else{
            $image=$request->file('foodImage');        
            $image->move('images',$image->getClientOriginalName());               
            $imageName=$image->getClientOriginalName(); 
            $addFood=Food::create([
                'name'=>$request->name,
                'available'=>$request->available,
                'price'=>$request->price,
                'categoryID'=>$request->categoryID,
                'image'=>$imageName,
            ]);
            
               // create a new FoodSelect instance
                $foodSelect = new FoodSelect();
                $foodSelect->name = $request->input('food_select_name');
                $foodSelect->food_id = $addFood->id;
                $foodSelect->save();

                // create an array to hold the options
                $options = [];

                // loop through each option and add it to the array
                $optionValues = $request->input('option-value-name');
                for ($i = 0; $i < count($optionValues); $i++) {
                    $option = new FoodOption();
                    $option->name = $optionValues[$i];
                    $option->food_id = $foodSelect->id;
                    $option->save();
                    $options[] = $option;
                }

                // attach the options to the food select
                $foodSelect->options()->saveMany($options);


            Toastr::success('You Successfully created food', 'Food Created', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food');
        }
    }

    //Update Food
    public function updateFood(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        $food = Food::all()->find($request->foodID);

        if($validator -> fails()){
            return redirect('admin/food')->withErrors($validator)->withInput();
        }
        else{
            if($request -> file('foodImage')!=''){
                $image=$request->file('foodImage');        
                $image->move('images',$image->getClientOriginalName());               
                $imageName=$image->getClientOriginalName(); 
                $food-> image = $imageName;
            }
            
            $food -> name = $request -> name;
            $food -> price = $request ->price;
            $food -> categoryID = $request->categoryID;
            $food -> save();

            Toastr::success('You Successfully updated Food.', 'Food Updated', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food');
        }
    }

    //Delete Food
    public function deleteFood($id){
        $deleteFood=Food::find($id);
        $deleteFood->delete();
        
        if($deleteFood){
           Session::flash('success',"Food delete successfully!");
            return redirect('admin/food'); 
        }
    }

    //Change Food Status
    public function changeStatus($id){
        $food = Food::where('id',$id)->first();
        if($food -> available > 0){
            $food -> available = 0;
            $food -> save();
            return redirect('admin/food');
        }
        else{
            $food -> available = 1;
            $food -> save();
            return redirect('admin/food');
        }
    }

    //Table
    public function table(){
        $tables = Table::all();
        $carts = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();
        $orders = DB::table('orders')->get();
        return view('admin/table',compact('tables','carts','orders'));
    }

    //Add Table
    public function addTable(Request $request){
        $validator = Validator::make($request->all(), [
            'table_id' => 'required|unique:tables,table_id',
        ]);
    
        if ($validator->fails()) {
            Toastr::error('Invalid Input', 'Validate Failed');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $addTable = Table::create([
            'table_id' => $request->table_id,
            'payment' => null,
        ]);
    
        if ($addTable) {
            Toastr::success('You Successfully Created a Table', 'Table Created', [
                "progressBar" => true,
                "debug" => true,
                "newestOnTop" => true,
                "positionClass" => "toast-top-right"
            ]);
            return redirect('admin/table');
        } else {
            Toastr::error('Failed to create table', 'Create Failed', [
                "progressBar" => true,
                "debug" => true,
                "newestOnTop" => true,
                "positionClass" => "toast-top-right"
            ]);
            return redirect('admin/table');
        }
    }

    public function generateTableId(){
        $tableID = '';
        $count = Table::all()->count();
        $tableID = $count + 1;
        return $tableID;
    }

    //Delete Table
    public function deleteTable($id){
        $table = Table::where('id',$id)->first();
        $table -> delete();

        if($table){
            Session::flash('success','Successfully delete table');
            return redirect('admin/table');
        }
        else{
            Session::flash('error','Something went wrong!');
            return redirect('admin/table');
        }
    }
    
    public function takenOrder(){
        $orders = Order::all();
        $carts = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();
        
        return view('admin/takenOrder', compact('orders', 'carts'));
        
    }
    
    public function donePreparing($id){
        $order = Order::where('id', $id)->first();
        event(new DonePrepare($order -> table_id));
        $order -> done_prepare_at = Carbon::now();
        $order -> status = 1;
        $order -> save();
        
        return redirect()->back();
    }

    //Waiter
    public function waiter(){

        $waiters = User::where('role',2)->get();
        $orders = Order::all();
        $works = Work::all();
        return view('admin/waiter',compact('waiters','orders','works'));
    }

    public function registerWaiter(Request $request){
        $validator = Validator::make($request->all(), [
            'w_name' => [
                Rule::unique('users', 'name')->where(function ($query) {
                    return $query->where('role', 2);
                }),
            ],
            'w_password' => 'min:8|max:12',
            'w_confirm_password' => 'same:w_password',
        ]);

        if($validator -> fails()){
            Toastr::error('Invalid input <br> Please try again','Validate Error',["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/waiter');
        }
        $addWaiter = User::create([
            'name' => $request -> w_name,
            'role' => 2,
            'password' => Hash::make($request -> w_password),
        ]);
        
        Action::action(Auth::user()->name, "Add waiter - " . $request -> w_name);

        Toastr::success('You successfully register a new waiter account','Register a waiter',["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect('admin/waiter');
    }
    
     //Delete Waiter
    public function deleteWaiter($id){
        $waiter = Table::where('id',$id)->first();
        $waiter -> delete();

        if($waiter){
            Session::flash('success','Successfully delete waiter');
            return redirect('admin/waiter');
        }
        else{
            Session::flash('error','Something went wrong!');
            return redirect('admin/waiter');
        }
    }

     //QrCode
    //  public function QrCode($id){
    //     $tables = Table::where('id',$id)->first();
    //     return view('QrCode',compact('tables'));
    // }
    

    public function viewTakenOrder($name)
    {
        $waiter = User::where('name',$name)->first();
        $orders = Order::where('waiter',$name)->where('status',"1")->get();

        return view('admin.viewOrder',compact('waiter','orders'));
    }
    
    public function searchDate(Request $request){
        $waiter = User::where('name',$request -> name)->first();
        $orders = Order::where('created_at','>=',$request -> from)->where('created_at','<=',$request -> to)->where('waiter',$request->name)->get();
        
        return view('admin.viewOrder',['name' => $request -> name],compact('waiter','orders'));
    }

    public function viewFoodlist($orderID)
    {
        $order = Order::where('orderID',$orderID)->first();
        $carts = DB::table('carts')->join('orders','carts.orderID','=','orders.orderID')
        ->join('food','carts.food_id','=','food.id')->select('carts.*','food.name as fName','food.price as fPrice')
        ->where('orders.orderID',$orderID)->get();

        return view('admin.viewFoodList',compact('order','carts'));
    }
    
    public function setup(){
        $qrcodes = Qrcode::all();
        
        return view('admin.setup', compact('qrcodes'));
    }

    
    public function addQrcode(Request $request){
        $image=$request->file('qrcode');        
        $image->move('images',$image->getClientOriginalName());               
        $imageName=$image->getClientOriginalName(); 
        $addQrCode=Qrcode::create([
            'name'=>$request->name,
            'qrcode'=>$imageName,
        ]);
        return back();
    }
    
    public function updateQrcode(Request $request){
        $qrcode = Qrcode::where('name',$request -> name)->first();
        if($request -> file('qrcode')!=''){
            $image=$request->file('qrcode');        
            $image->move('images',$image->getClientOriginalName());               
            $imageName=$image->getClientOriginalName(); 
            $qrcode-> qrcode = $imageName;
        }
        
        $qrcode -> name = $request -> name;
        $qrcode -> save();
        
        return back();
    }

}