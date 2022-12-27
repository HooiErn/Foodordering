<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Food;
use App\Models\Table;
use App\Models\Waiter;
use App\Models\Cart;
use Session;
use Cookie;
use DB;

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
            return redirect('admin/dashboard');
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

    //Food
    public function food(){
        $categories = Category::all();
        $foods = Food::all();
        return view('admin/food', compact('categories','foods'));
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

            Toastr::success('Category&#39;s name has been changed', 'Update Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
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

        Toastr::success('Category and related food have been deleted', 'Delete Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect('admin/food');
    }

    //Add Food
    public function addFood(Request $request){

        $validator = Validator::make($request->all(), [
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

            Toastr::success('A new food has been added', 'Add Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food');
        }
    }

    //Update Food
    public function updateFood(Request $request){

        $food = Food::all()->find($request->foodID);

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
        $food -> categoryID = $request -> categoryID;
        $food -> save();

        Toastr::success('You have changed the food detail', 'Update Successfully', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect('admin/food');

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
        ->leftjoin('food','carts.food_id','=','food.id')
        ->select('carts.*','food.name as name','food.price as price','carts.quantity as quantity');
        return view('admin/table',compact('tables','carts'));
    }

    //Add Table
    public function addTable(){
        $id = $this -> generateTableId();

        if($id){
            $addTable = Table::create([
                'table_id' => $id,
            ]);
            if($addTable){
                Session::flash('success','Successfully create a table');
                return redirect('admin/table');
            }
            else{
                Session::flash('error','Fail to create a table');
                return redirect('admin/table');
            }
        }
        
    }

    public function generateTableId(){
        $tableID = '';
        for($i = 0; $i < 5; $i++){ $tableID .= mt_rand(0, 9); }
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

        return view('admin/waiter',compact('waiters'));
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

    //Test
    public function test(){
        return view('admin/test');
    }

    public function print(){
        $tables = Table::all();
        $carts = DB::table('carts')
        ->leftjoin('food','carts.food_id','=','food.id')
        ->select('carts.*','food.name as name','food.price as price','carts.quantity as quantity');
        return view('pages.receipt',compact('tables','carts'));
    }

}