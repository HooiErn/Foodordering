<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WaiterController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Order;
use App\Models\Cart;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

//Admin Login & Logout
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

//Admin
//Admin DashBoard
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

//Food
Route::get('admin/food',[AdminController::class, 'food'])->name('admin.food');
Route::post('admin/addFood',[AdminController::class, 'addFood']);
Route::post('admin/updateFood/',[AdminController::class, 'updateFood'])->name('update.food');
Route::get('admin/deleteFood/{id}',[AdminController::class, 'deleteFood']);

//Category
Route::post('admin/addCategory',[AdminController::class,'addCategory']);
Route::get('admin/deleteCategory/{id}',[AdminController::class, 'deleteCategory']);
Route::post('admin/updateCategory',[AdminController::class,'updateCategory'])->name('update.category');

//Others
Route::get('changeStatus/{id}',[AdminController::class, 'changeStatus']);
Route::get('viewOrder/{name}',[AdminController::class, 'viewTakenOrder'])->name('view.order');
Route::post('admin/searchDate',[AdminController::class,'searchDate']);
Route::get('admin/viewFoodList/{orderID}',[AdminController::class, 'viewFoodList']);

// --- Waiter ---
Route::get('admin/waiter',[AdminController::class, 'waiter']);
Route::post('admin/registerWaiter',[AdminController::class, 'registerWaiter']);
Route::get('admin/deleteWaiter/{id}',[AdminController::class, 'deleteWaiter']);
//Table 
Route::get('admin/table',[AdminController::class, 'table']);
Route::get('admin/addTable',[AdminController::class, 'addTable']);
Route::get('admin/deleteTable/{id}',[AdminController::class, 'deleteTable']);

//Touch n Go
Route::get('admin/setup',[AdminController::class,'setup']);

//Waiter login and logout
Route::get('waiter/login', [WaiterController::class, 'login']);
Route::post('waiter/login', [WaiterController::class, 'check_login']);
Route::get('waiter/logout', [WaiterController::class, 'logout']);
Route::get('takeOrder', [WaiterController::class, 'takeOrder']);

//Waiter
// --- Dashboard ---
Route::get('waiter/scan',[WaiterController::class, 'scan']);

// --- Order ---
Route::get('waiter/order',[WaiterController::class, 'viewTakenOrder'])->name('waiter.order');
Route::get('waiter/viewFoodList/{orderID}',[WaiterController::class,'viewFoodList']);
Route::post('waiter/searchDate',[WaiterController::class,'searchDate']);
Route::get('waiter/placeOrder',[WaiterController::class, 'placeOrder']);
Route::get('waiter/add-to-cart/{id}', [WaiterController::class, 'addToCart']);


//View Food
Route::get('food/view/{id}',[FoodController::class, 'view'])->name('view.food');

//Rating
//Add
Route::post('/add-rating', [RatingController::class, 'rating']);

//--- Cart ---
//Add
Route::post('/add-to-cart',[CartController::class, 'addCart']);
//View
Route::get('viewCart/{id}',[HomeController::class,'view']);
//Delete
Route::get('deleteCart/{id}',[CartController::class,'deleteCart']);

Route::post('update-to-cart',[CartController::class,'updateCart']);
Route::post('confirmOrder',[CartController::class,'confirmOrder']);

//Payment
Route::post('/checkout', [PaymentController::class, 'paymentPost'])->name('payment.post');

Route::get('login', [AuthController::class, 'index']);
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');

//Print receipt
Route::get('receipt/{orderID}',function($orderID){
    $order = Order::where('orderID',$orderID)->first();
    $carts = \DB::table('carts')->join('orders','carts.orderID','=','orders.orderID')
    ->join('food','carts.food_id','=','food.id')->select('carts.*','food.name as fName','food.price as fPrice')
    ->where('orders.orderID',$orderID)->get(); //if use Cart model, it somehow pass all food in there, regardless if you choose it or not

    return view('pages.receipt',compact('carts','order'));
})->name('receipt');

//Place Order waiter
Route::get('waiter/placeOrder',[WaiterController::class, 'placeOrder']);

Auth::routes();

//Payment Method
Route::get('method/{id}', [HomeController::class, 'method']);
//Menu
Route::get('/home/{id}', [HomeController::class, 'index'])->name('home');

