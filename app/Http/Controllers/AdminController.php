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
                return redirect()->route('login.form');
            }
            return $next($request);
        });
    }

    //Dashboard
    public function index(){
        $data = Order::all();
        
        
        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');
        
        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();
        
        return view('admin/dashboard',compact('data', 'totalOrder', 'todayOrder', 'thisMonthOrder', 'thisYearOrder'));
    }
    
    public function analytics(){
        return view('admin/analytics');
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
            return redirect('admin/food')->withInput()->withErrors($validator); 
        
        }

        $image=$request->file('foodImage');        
        $image->move('images',$image->getClientOriginalName());               
        $imageName=$image->getClientOriginalName();

        $food = new Food;
        $food -> name = $request -> name;
        $food -> available = $request -> available;
        $food -> price = $request -> price;
        $food -> categoryID = $request -> categoryID;
        $food -> image = $imageName;
        $food -> save();

        if($request -> has('select_option_name') && $request -> has('option_value_name')){
            $selectNames = $request -> select_option_name;
            foreach($selectNames as $i => $selectName){
                $newSelect = new FoodSelect;
                $newSelect -> name = $selectName;
                $newSelect -> food_id = $food -> id;
                $newSelect -> save();

                $optionValues = $request -> option_value_name;
                foreach ($optionValues[$i] as $optionValue) {
                    $newOptionValue = new FoodOption;
                    $newOptionValue->name = $optionValue;
                    $newOptionValue->food_select_id = $newSelect->id; // associate with the current select
                    $newOptionValue->save();
                }
            }
        }

        event(new MenuRefresh());
        Toastr::success('You Successfully created food', 'Food Created', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect('admin/food');
    }

    // Update Food
    public function updateFood(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);
    
        $food = Food::find($request->foodID);
    
        if($validator -> fails()){
            return redirect('admin/food')->withErrors($validator)->withInput();
        }
        else{
            if($request -> file('foodImage')!=''){
                $image=$request->file('foodImage');        
                $image->move('images',$image->getClientOriginalName());               
                $imageName=$image->getClientOriginalName(); 
                $food->image = $imageName;
            }
            
            $food->name = $request->name;
            $food->price = $request->price;
            $food->categoryID = $request->categoryID;
            
            $food->save();
    
            if($request -> has('edit_select_name') && $request -> has('edit_option')){
                $selectNames = $request->input('edit_select_name', []);
                $options = $request->input('edit_option', []);
    
                $existingSelects = $food->foodSelect;
    
                foreach ($existingSelects as $index => $existingSelect) {
                    $existingSelect->name = $selectNames[$index];
                    $existingSelect->save();
        
                    $existingOptions = $existingSelect->foodOption;
                    $existingOptionCount = count($existingOptions);
                    $newOptionCount = count($options[$index]);
        
                    // Update existing options
                    for ($i = 0; $i < $existingOptionCount; $i++) {
                        if ($i < $newOptionCount) {
                            $existingOptions[$i]->name = $options[$index][$i];
                            $existingOptions[$i]->save();
                        } else {
                            $existingOptions[$i]->delete(); // Remove extra options
                        }
                    }
                }
            }
    
            Toastr::success('You Successfully updated Food.', 'Food Updated', ["progressBar" => true, "debug" => true, "newestOnTop" => true, "positionClass" => "toast-top-right"]);
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
    
    // Delete Food Select
    public function deleteSelect($id){
        $foodSelect = FoodSelect::where('id',$id)->first();
        $foodSelect -> delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Item deleted successfully'
        ]);
    }
    
    // Delete Food Option
    public function deleteSelectOption($id){
        $foodOption = FoodOption::where('id',$id)->first();
        $foodOption -> delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Item deleted successfully'
        ]);
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
            Toastr::success('You Successfully Created a Table '.$request -> table_id, 'Table Created', [
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

    //Delete Table
    public function deleteTable($id){
        $table = Table::where('table_id',$id)->first();
        $table -> delete();

        if($table){
            return redirect('admin/table');
        }
        else{
            return redirect('admin/table');
        }
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
            Toastr::error('Invalid input please try again.', 'Validate Fail', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect('admin/waiter')->withInput()->withErrors($validator);
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
        $waiter = User::where('id',$id)->first();
        $waiter -> delete();

        if($waiter){
            
            return redirect('admin/waiter');
        }
        else{
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

        if(!($waiter && $orders)){
            return view('404');
        }

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

        if(!$order){
            return view('404');
        }

        $item1 = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $item2 = DB::table('waiter_carts')
        ->join('food as detail','waiter_carts.food_id','detail.id')
        ->select('waiter_carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $carts = $item1 -> merge($item2);

        return view('admin.viewFoodList',compact('order','carts'));
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
        
        return view('admin/takenOrder', compact('orders', 'carts'));
        
    }
    
    public function setup(){
        $qrcode = DB::table('qrcodes')->first();
        
        return view('admin.setup', compact('qrcode'));
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
        $qrcode = Qrcode::find($request -> id);
        
        if($request -> has('name')){
            $qrcode -> name = $request -> name;
        }
        
        if($request -> has('qrcode')){
            $image=$request->file('qrcode');        
            $image->move('images',$image->getClientOriginalName());               
            $imageName=$image->getClientOriginalName(); 
            $qrcode-> qrcode = $imageName;
        }
        
        $qrcode -> save();
        return back();
    }

}