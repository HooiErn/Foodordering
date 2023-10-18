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
use App\Models\StockList;
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
use Analytics;
use Spatie\Analytics\Period;

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
        
        // $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');
        
        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();
        
        return view('admin/dashboard',compact('data', 'totalOrder', 'todayOrder', 'thisMonthOrder', 'thisYearOrder'));
        
        //, 'analyticsData'
    }
    
    public function analytics(Request $request)
    {
        $days = $request->input('days', 7);
        $period = Period::days($days);
        $total = Analytics::fetchTotalVisitorsAndPageViews($period);
        $datas = Analytics::fetchVisitorsAndPageViews($period);
    
        return view('admin/analytics', compact('datas', 'total'));
    }
    
    // Bill
    public function bills(){
        $tables = Table::all();
        
        $orders = Order::orderByDesc('created_at')->get();
        
        $qrcode = Qrcode::first();
        
        $item1 = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $item2 = DB::table('waiter_carts')
        ->join('food as detail','waiter_carts.food_id','detail.id')
        ->select('waiter_carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $carts = $item1 -> merge($item2);
        
        return view('admin/bills', compact('tables','orders', 'carts','qrcode'));
    }
    
    public function allBills(){
        $tables = Table::all();
        
        $orders = Order::orderByDesc('created_at')->where('is_paid', '!=', 0)->get();
        
        $qrcode = Qrcode::first();
        
        $item1 = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $item2 = DB::table('waiter_carts')
        ->join('food as detail','waiter_carts.food_id','detail.id')
        ->select('waiter_carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $carts = $item1 -> merge($item2);
        
        return view('admin/allBills', compact('tables','orders', 'carts','qrcode'));
    }
    
    public function allBills_date($date){
        $orders = Order::whereDate('created_at', $date)->orderByDesc('created_at')->where('is_paid', '!=', 0)->get();
        
        $item1 = DB::table('carts')
        ->join('food as detail','carts.food_id','detail.id')
        ->select('carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $item2 = DB::table('waiter_carts')
        ->join('food as detail','waiter_carts.food_id','detail.id')
        ->select('waiter_carts.*','detail.name as name','detail.image as image','detail.price as price')
        ->get();

        $carts = $item1 -> merge($item2);
        
        return view('admin/allBills_date', compact('orders','carts'));
    }
    
    public function bill_check(Request $request) {
        try {
            DB::beginTransaction();
    
            $orders = Order::whereIn('orderID', $request->order_ids)->get();
            foreach ($orders as $order) {
                $order->is_paid = 1;
                $order->save();
            }
    
            DB::commit();
    
            return response()->json(['message' => 'Orders marked as paid'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Error marking orders as paid'], 500);
        }
    }
    
    public function bill_uncheck(Request $request){
        try {
            DB::beginTransaction();
    
            $orders = Order::whereIn('orderID', $request->order_ids)->get();
            foreach ($orders as $order) {
                $order->is_paid = 2;
                $order->save();
            }
    
            DB::commit();
    
            return response()->json(['message' => 'Orders marked as unpaid'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Error marking orders as unpaid'], 500);
        }
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
    
    // Stock
    public function stock(){
        $foods = Food::all()->sortBy('name');
        
        return view('admin/stock', compact('foods'));
    }
    
    public function stockInfo($id){
        $food = Food::find($id);
        $stocks = StockList::where('food_id',$food -> id)->get();
        
        return view('admin/stock-info', compact('stocks','food'));
    }
    
    // Stock History
    public function stockHistory(){
        $foods = Food::all();
        $stock_histories = StockList::whereDate('created_at', now()->toDateString())->get();
        return view('admin/stock-history', compact('foods', 'stock_histories'));
    }
    
    public function stockHistorySearchDate(Request $request){
        $foods = Food::all();
        $stock_histories = StockList::whereDate('created_at','>=',$request -> from)->whereDate('created_at','<=',$request -> to)->get();
        return view('admin/stock-history', compact('foods', 'stock_histories'));
    }
    
    // Add Stock
    public function addStock(Request $request){
        if($request -> quantity == 0){
            Toastr::info('Please enter a valid value for quantity');
            return redirect()->back();
        }
        
        $food = Food::where('id', $request -> food_id)->first();
        
        $newStockList = StockList::create([
            'food_id' => $request -> food_id,
            'action' => 1,
            'quantity' => $request -> quantity,
        ]);
        
        $food -> stock += $request -> quantity;
        $food -> save();
        
        $this -> checkAndUpdateAvailability($food);
        
        Action::action(Auth::user()->name, "Add". $request -> quantity ."stocks for " . $food -> name);
        Toastr::success('Stock has been successfully added.', 'Success');
        return redirect()->back();
    }
    
    // Remove Stock
    public function removeStock(Request $request){
        $food = Food::where('id', $request -> food_id)->first();
        
        if ($food->stock < $request->quantity) {
            Toastr::error('Insufficient stock to remove.', 'Error');
            return redirect()->back();
        }
        
        $newStockList = StockList::create([
            'food_id' => $request -> food_id,
            'action' => 2,
            'quantity' => $request -> quantity,
        ]);
        
        $food -> stock -= $request -> quantity;
        $food -> save();
        
        $this -> checkAndUpdateAvailability($food);
        
        Toastr::success('Stock has been successfully removed.', 'Success');
        return redirect()->back();
    }
    
    private function checkAndUpdateAvailability($food){
        if ($food->stock === 0) {
            // Set $food->available to 2
            $food->available = 0;
            // Save the updated $food object to the database (or your data store)
            $food->save();
        }
        elseif ($food -> stock > 0){
            $food->available = 1;
            // Save the updated $food object to the database (or your data store)
            $food->save();
        }
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
        if($request -> stock == 1){
            $food -> stock = null;
        }
        elseif($request -> stock == 2){
            $food -> stock = $request -> numberInput;
        }
        $food -> price = $request -> price;
        $food -> categoryID = $request -> categoryID;
        $food -> image = $imageName;
        $food -> save();
        
        if($request -> stock == 2){
            $newStockList = StockList::create([
                'food_id' => $food -> id,
                'action' => 1,
                'quantity' => $request -> numberInput,
            ]);
        }

        if ($request->has('select_option_name') && $request->has('option_value_name') && $request->has('option_value_price')) {
            $selectNames = $request->select_option_name;
            $optionValues = $request->option_value_name;
            $optionPrices = $request->option_value_price;
        
            foreach ($selectNames as $i => $selectName) {
                $newSelect = new FoodSelect;
                $newSelect->name = $selectName;
                $newSelect->food_id = $food->id;
                $newSelect->save();
        
                if (isset($optionValues[$i]) && isset($optionPrices[$i])) {
                    foreach ($optionValues[$i] as $j => $optionValue) {
                        $newOptionValue = new FoodOption;
                        $newOptionValue->name = $optionValue;
                        $newOptionValue->price = $optionPrices[$i][$j]; // Set the price value here
                        $newOptionValue->food_select_id = $newSelect->id;
                        $newOptionValue->save();
                    }
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
            if ($request->stock == 1) {
                // Set food stock to null
                $food->stock = null;
            
                // Create a new StockList record only if the original stock was greater than 0
                if (is_array($food->original) && ($food->original['stock'] > 0 || $food->original['stock'] === null)) {
                    $newStockList = StockList::create([
                        'food_id' => $food->id,
                        'action' => 2,
                        'quantity' => $request->stockNumber,
                    ]);
                }
            } elseif ($request->stock == 2) {
                // Set food stock to 0 if it's not already set
                if ($food->stock === null) {
                    $food->stock = 0;
                }
            }
            $food->save();
    
            if ($request->has('edit_select_name') && $request->has('edit_option')) {
                $selectNames = $request->input('edit_select_name', []);
                $options = $request->input('edit_option', []);
                $optionPrices = $request->input('edit_option_price', []); // Add this line for prices
                
                $existingSelects = $food->foodSelect;
            
                foreach ($existingSelects as $index => $existingSelect) {
                    $existingSelect->name = $selectNames[$index];
                    $existingSelect->save();
                    
                    $existingOptions = $existingSelect->foodOption;
                    $existingOptionCount = count($existingOptions);
                    $newOptionCount = count($options[$index]);
                    
                    // Update existing options and prices
                    for ($i = 0; $i < $existingOptionCount; $i++) {
                        if ($i < $newOptionCount) {
                            $existingOptions[$i]->name = $options[$index][$i];
                            $existingOptions[$i]->price = $optionPrices[$index][$i]; // Set the price here
                            $existingOptions[$i]->save();
                        } else {
                            $existingOptions[$i]->delete(); // Remove extra options
                        }
                    }
            
                    // Create new options if necessary
                    for ($i = $existingOptionCount; $i < $newOptionCount; $i++) {
                        $newOption = new FoodOption;
                        $newOption->name = $options[$index][$i];
                        $newOption->price = $optionPrices[$index][$i]; // Set the price here
                        $newOption->food_select_id = $existingSelect->id;
                        $newOption->save();
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
          Toastr::success('You Successfully deleted Food.', 'Food Updated', ["progressBar" => true, "debug" => true, "newestOnTop" => true, "positionClass" => "toast-top-right"]);
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
            return view('404');
        }
    }
    

    //Waiter
    public function waiter_report(){

        $waiters = User::where('role',2)->get();
        $orders = Order::whereDate('created_at', now()->toDateString())->get();
        $works = Work::whereDate('created_at', now()->toDateString())->get();
        return view('admin/waiter-report',compact('waiters','orders','works'));
    }
    
    public function waiter_list($id){
        $waiters = User::where('role',2)->orderBy('name')->get();
        $detail = User::find($id);
        return view('admin/waiter-list',compact('waiters', 'detail'));
    }
    
    public function edit_waiter(Request $request){
        $waiter = User::where('id', $request -> id)->first();
        if($request -> has('name')){
            $waiter -> name = $request -> name;
        }
        if($request -> has('password') && $request -> password !== null){
            $waiter -> password = bcrypt($request -> password);
        }
        $waiter -> save();
        
        Toastr::success('You successfully edit a new waiter account','Edit a waiter password',["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }
    
    public function waiterSearchDate(Request $request){
        $orders = Order::whereDate('created_at','>=',$request -> from)->whereDate('created_at','<=',$request -> to)->get();
        $works = Work::whereDate('created_at','>=',$request -> from)->whereDate('created_at','<=',$request -> to)->get();
        $waiters = User::where('role',2)->get();

        return view('admin/waiter-report', compact('waiters', 'orders', 'works'))
        ->with(['fromDate' => $request->from, 'toDate' => $request->to]); // Pass dates as query parameters; 
    }

    public function registerWaiter(Request $request){
        $validator = Validator::make($request->all(), [
            'w_name' => [
                Rule::unique('users', 'name')->where(function ($query) {
                    return $query->where('role', 2);
                }),
            ],
            'w_password' => 'max:12',
            'w_confirm_password' => 'same:w_password',
        ]);

        if($validator -> fails()){
            Toastr::error('Invalid input please try again.', 'Validate Fail', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $addWaiter = User::create([
            'name' => $request -> w_name,
            'role' => 2,
            'password' => Hash::make($request -> w_password),
        ]);
        
        Action::action(Auth::user()->name, "Add waiter - " . $request -> w_name);

        Toastr::success('You successfully register a new waiter account','Register a waiter',["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }
    
     //Delete Waiter
    public function deleteWaiter($id){
        $waiter = User::where('id',$id)->first();
        $waiter -> deleted = 2;
        $waiter -> save();

        if($waiter){
            
            return redirect()->back();
        }
        else{
            return view('404');
        }
    }
    
    public function undoDeletedWaiter($id){
        $waiter = User::where('id',$id)->first();
        $waiter -> deleted = 1;
        $waiter -> save();

        if($waiter){
            
            return redirect()->back();
        }
        else{
            return view('404');
        }
    }

     //QrCode
    //  public function QrCode($id){
    //     $tables = Table::where('id',$id)->first();
    //     return view('QrCode',compact('tables'));
    // }

    
    public function viewTakenOrder($name, Request $request)
    {
        $waiter = User::where('name',$name)->first();

       // Retrieve date values from the query parameters or use today's date as default
        $fromDate = $request->query('fromDate', now()->toDateString());
        $toDate = $request->query('toDate', now()->toDateString());

        $orders = Order::where('waiter', $name)
            ->where('status', "1")
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->get();

        if(!($waiter && $orders)){
            return view('404');
        }

        return view('admin.viewOrder',compact('waiter','orders','fromDate','toDate'));
    }
    
    public function searchDate(Request $request){
        $waiter = User::where('name',$request -> name)->first();
        $orders = Order::whereDate('created_at','>=',$request -> from)
        ->whereDate('created_at','<=',$request -> to)->where('waiter',$request->name)->get();

        return view('admin.viewOrder',['name' => $request -> name],compact('waiter','orders'))
        ->with(['fromDate' => $request->from, 'toDate' => $request->to]);
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


    //Member
    
     public function member_list($id){
        $members = User::where('role',4)->orderBy('name')->get();
        $detail = User::find($id);
        return view('admin/member-list',compact('members', 'detail'));
    }
    
    public function edit_member(Request $request){
        $member = User::where('id', $request -> id)->first();
        if($request -> has('name')){
            $member -> name = $request -> name;
        }
        if($request -> has('password') && $request -> password !== null){
            $member -> password = bcrypt($request -> password);
        }
        $member -> save();
        
        Toastr::success('You successfully edit a new member account','Edit a member password',["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }
    
    public function registerMember(Request $request){
        $validator = Validator::make($request->all(), [
            'm_name' => [
                Rule::unique('users', 'name')->where(function ($query) {
                    return $query->where('role', 4);
                }),
            ],
            'm_password' => 'max:12',
            'm_confirm_password' => 'same:m_password',
        ]);

        if($validator -> fails()){
            Toastr::error('Invalid input please try again.', 'Validate Fail', ["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $addMember = User::create([
            'name' => $request -> m_name,
            'role' => 4,
            'password' => Hash::make($request -> m_password),
        ]);
        
        Action::action(Auth::user()->name, "Add member - " . $request -> m_name);

        Toastr::success('You successfully register a new member account','Register a member',["progressBar" => true, "debug" => true, "newestOnTop" =>true, "positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }
    
     //Delete Member
    public function deleteMember($id){
        $member = User::where('id',$id)->first();
        $member -> deleted = 4;
        $member -> save();

        if($member){
            
            return redirect()->back();
        }
        else{
            return view('404');
        }
    }
    
    public function undoDeletedMember($id){
        $member = User::where('id',$id)->first();
        $member -> deleted = 4;
        $member -> save();

        if($member){
            
            return redirect()->back();
        }
        else{
            return view('404');
        }
}
}