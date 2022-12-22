<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Food;
use App\Models\Table;
use Session;
use Cookie;
use File;
use DB;
use Brian2694\Toastr\Facades\Toastr;

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

            Toastr::success('Login Successfully', 'Welcome back', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/dashboard');
        }
        else{
            return redirect('admin/login')->with('msg', 'Invalid name/password!!');
        }
    }

    //Logout
    public function logout(){
        session()->forget(['adminData']);
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
            return redirect('admin/food')->withErrors($validator)->withInput(); 
        }
        else{
            if(count($categories)){
                Toastr::error('The Category Already Exists!','Error', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('admin/food');
            }
            else{
                $category = Category::create([
                    'name' => $request -> name,
                ]);

                Toastr::success('You Successfully Created a Category!','Category Created', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('admin/food');
            }
        }
    }

    public function updateCategory(Request $request){
        $check = Category::where('name',$request -> name)->get();

        $validated = $this->validate($request,[
            'name' => 'required'
        ]); 
        
        if(count($check)){
            Toastr::error('This categories already exists!','Error', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/food');
        }else{
        $category = Category::where('id',$request -> catID)->first();
        $category -> name = $request -> name;
        $category -> save();

        Toastr::success('You Successfully Updated a Category!','Category Updated', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect()->route('admin.food', $category->id);
        }
        
    }

    public function deleteCategory($id){
        $category = Category::where('id',$id)->first();
        $foods = Food::where('categoryID',$category -> id)->get();

        foreach($foods as $food){
            $food -> delete();
        }
        $category -> delete();
        Toastr::success('You Successfully Deleted a Category and its Food!','Category Deleted', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
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
            return redirect('admin/food')->withErrors($validator)->withInput(); 
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

            Toastr::success('You Successfully Added a Food!','Food Added', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
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
                $food -> save();

                Toastr::success('You Successfully Updated a Food!','Food Updated', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('admin/food');
            
        }
    }

    //Delete Food
    public function deleteFood($id){
        $deleteFood=Food::find($id);
        $deleteFood->delete();
        
        if($deleteFood){
            Toastr::success('You Successfully Deleted a Food!','Food Deleted', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
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
        return view('admin/table',compact('tables'));
    }

    //Add Table
    public function addTable(){
        $tables = DB::table('tables')->count();

        $number = $tables + 1;

        if($number){
            $addTable = Table::create([
                'name' => "Table $number",
            ]);
            if($addTable){
                Toastr::success('You Successfully Created a Table!','Table Created', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('admin/table');
            }
            else{
                Toastr::error('You Failed To Created a Table!','Failed to create table', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
                return redirect('admin/table');
            }
        }
        else{
            Toastr::error('Something went wrong!','Error', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/table');
        }
    }

    public function deleteTable($id){
        $table = Table::where('id',$id)->first();
        $table -> delete();

        if($table){
            Toastr::success('You Successfully Deleted a Table!','Table Deleted', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/table');
        }
        else{
            Toastr::error('Something went wrong!','Error', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/table');
        }
    }

    //Test
    public function test(){
        return view('admin/test');
    }

}