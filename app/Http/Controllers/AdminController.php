<?php

namespace App\Http\Controllers;

use DB;
use Cookie;
use Session;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Table;
use App\Models\Waiter;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //Login
    public function login(){
        return view('admin/login');
    }

    //Check Login
    public function check_login(Request $request){

        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where(['name' => $request->name, 'password' => sha1($request->password)])->count();

        if($request->has('rememberme')){
            Cookie::queue('name',$request->name,1440); //1440 means it stays for 24 hours
            Cookie::queue('password',$request->password,1440);
        }

        if($admin > 0){
            $adminData = Admin::where(['name' => $request->name, 'password' => sha1($request->password)])->get();
            session(['adminData' => $adminData]);
            Toastr::success('Welcome back '.$request -> name, 'Login Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food');
        }
        else{
            Toastr::error('Please try again', 'Invalid name / password', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/login');
        }
    }

    //Logout
    public function logout(){
        session()->forget(['adminData']);
        Toastr::info('You have logout your account', 'Logout Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect('admin/login');
    }

    //Dashboard
    public function index(){
        $categories = DB::table('categories')->select('categories.*')->get();
        $foods = DB::table('food')->leftjoin('categories','categories.id','=','food.categoryID')->select('food.*','categories.name as categoryName')->get();
        return view('admin/dashboard')->with(["categories" => $categories])->with(["foods" => $foods]);
    }

    //Add Category
    public function addCategory(Request $request){
        $categories = Category::where('name','like','%'.$request -> name.'%')->get();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator -> fails()){
            Toastr::error('Something went wrong', 'Error', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food'); 
        }
        else{
            if(count($categories)){
                Toastr::error('This name has been used <br> Please try a new one', 'Repeat name', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('admin/food');
            }
            else{
                $category = Category::create([
                    'name' => $request -> name,
                ]);

                Toastr::success('A new category has been added', 'Add Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('admin/food');
            }
        }
    }

    //Update Category
    public function updateCategory(Request $request){
        $check = Category::where('name','like','%'.$request -> name.'%')->get();

        if(count($check)){
            Toastr::error('This category name already exists. <br> Please try again.', 'Repeat name', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food');
        }
        else{
            $category = Category::where('id',$request -> catID)->first();

            $category -> name = $request -> name;
            $category -> save();

            Toastr::success('Category name has been changed', 'Update Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food');
        }
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
            'description' => 'required',
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
                'description'=>$request->description,
                'available'=>$request->available,
                'price'=>$request->price,
                'categoryID'=>$request->categoryID,
                'image'=>$imageName,
            ]);

            Toastr::success('You Successfully created food', 'Food Created', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food');
        }
    }

    //Update Food
    public function updateFood(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'available' => 'required',
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
            $food -> description = $request -> description;
            $food -> available = $request -> available;
            $food -> price = $request ->price;
            $food -> categoryID = $request->categoryID;
            $food -> save();

            Toastr::success('You Successfully updated Food.', 'Food Updated', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food');
        }
    }

    //Food
    public function food(){
        $categories = Category::all();
        $foods = Food::all();
        return view('admin/food', compact('categories','foods'));
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
    public function addTable(){
        $id = $this -> generateTableId();

        if($id){
            $addTable = Table::create([
                'table_id' => $id,
            ]);
            if($addTable){
                Toastr::success('You Successfully Created a Table', 'Table Created', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('admin/table');
            }
            else{
                Toastr::error('Failed to create table...', 'Create Failed', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('admin/table');
            }
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

    //Waiter
    public function waiter(){

        $waiters = Waiter::all();
        $orders = Order::all();
        return view('admin/waiter',compact('waiters','orders'));
    }

    public function registerWaiter(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);

        if($validator -> fails()){
            Toastr::error('Invalid input <br> Please try again','Validate Error',["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/waiter');
        }
        else{
            $addWaiter = Waiter::create([
                'name' => $request -> name,
                'password' => sha1($request -> password),
            ]);

            Toastr::success('You successfully register a new waiter account','Register a waiter',["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/waiter');
        }
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
        $waiter = Waiter::where('name',$name)->first();
        $orders = Order::where('waiter',$name)->where('is_paid',"1")->get();

        return view('admin.viewOrder',compact('waiter','orders'));
    }
    
    public function searchDate(Request $request){
        $waiter = Waiter::where('name',$request -> name)->first();
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
        return view('admin.setup');
    }

}