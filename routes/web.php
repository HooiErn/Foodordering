<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WaiterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\KitchenController;
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

// Default = Login
Route::get('/', function () {
    return view('login-form');
});

// Login & Logout
Route::get('/login/form', [HomeController::class, 'login_form'])->name('login.form');
Route::post('/checkLogin', [HomeController::class, 'check_login']);
Route::get('/logout', [HomeController::class, 'logout']);

// Kitchen
// Show Food
Route::get('kitchen/food', [KitchenController::class, 'food'])->name('kitchen.food');
Route::get('kitchen/changeStatus/{id}', [KitchenController::class, 'changeStatus'])->name('kitchen.changeStatus');

// Taken Order
Route::get('kitchen/takenOrder', [KitchenController::class, 'takenOrder']);
Route::get('kitchen/donePreparing/{id}', [KitchenController::class, 'donePreparing']);

//Admin
//Admin DashBoard
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

// Action List
Route::get('admin/action-list', [AdminController::class, 'actionList']);
Route::post('admin/addSubAccount', [AdminController::class, 'addSubAccount']);
Route::get('admin/deleteSubAccount/{id}', [AdminController::class, 'deleteSubAccount']);

// Taken Order
Route::get('admin/takenOrder', [AdminController::class,'takenOrder']);

//Food
Route::get('admin/food',[AdminController::class, 'food'])->name('admin.food');
Route::post('admin/addFood',[AdminController::class, 'addFood']);
Route::post('admin/updateFood/',[AdminController::class, 'updateFood'])->name('update.food');
Route::get('admin/deleteFood/{id}',[AdminController::class, 'deleteFood']);
Route::get('admin/deleteSelect/{id}', [AdminController::class, 'deleteSelect'])->name('delete.select');
Route::get('admin/deleteSelectOption/{id}', [AdminController::class, 'deleteSelectOption'])->name('delete.selectOption');

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
Route::post('admin/addTable',[AdminController::class, 'addTable']);
Route::get('admin/deleteTable/{id}',[AdminController::class, 'deleteTable']);

//Touch n Go
Route::get('admin/setup',[AdminController::class,'setup']);
Route::post('admin/addQrcode', [AdminController::class, 'addQrcode']);
Route::post('admin/updateQrcode', [AdminController::class, 'updateQrcode']);

//Waiter
// --- Dashboard ---
Route::get('waiter/scan',[WaiterController::class, 'scan']);

// --- Order ---
Route::get('waiter/order',[WaiterController::class, 'viewTakenOrder'])->name('waiter.order');
Route::get('waiter/viewFoodList/{orderID}',[WaiterController::class,'viewFoodList']);
Route::post('waiter/searchDate',[WaiterController::class,'searchDate']);
Route::get('waiter/placeOrder',[WaiterController::class, 'placeOrder']);
Route::get('waiter/add-to-cart/{id}', [WaiterController::class, 'addToCart']);
Route::get('waiter/showWork',[WaiterController::class, 'showWork']);
Route::get('waiter/orderDetail/{id}', [WaiterController::class, 'orderDetail']);

// --- Work ---
Route::get('waiter/work', [WaiterController::class, 'work']);
Route::get('waiter/acceptWork/{id}', [WaiterController::class, 'acceptWork']);

//View Food
Route::get('food/view/{id}',[FoodController::class, 'view'])->name('view.food');

//--- Cart ---
//Add
Route::post('/add-to-cart',[CartController::class, 'addCart']);
Route::post('/on-unload', [CartController::class, 'onUnload'])->name('onUnload');
Route::get('/food-detail/{id}/{table_id}', [CartController::class, 'food_detail']);
//View
Route::get('viewCart/{id}',[HomeController::class,'view']);
//Delete
Route::get('deleteCart/{id}',[CartController::class,'deleteCart']);

Route::post('update-to-cart',[CartController::class,'updateCart']);
Route::post('confirmOrder',[CartController::class,'confirmOrder']);

//Receipt (cash)
Route::get('viewReceipt/{id}', [HomeController::class, 'viewReceipt'])->name('viewReceipt');
Route::get('receipt/{id}',[HomeController::class, 'receipt'])->name('receipt');
//Receipt (touch n go)
Route::get('touchngo', [HomeController::class, 'scanTouchnGo']);

//Place Order waiter
Route::get('waiter/placeOrder',[WaiterController::class, 'placeOrder']);

Auth::routes();

//Payment Method
Route::get('method/{id}', [HomeController::class, 'method'])->name('method');
Route::post('changePayment', [HomeController::class, 'changePayment']);

// Call Waiter
Route::post('callWaiter', [HomeController::class, 'callWaiter']);

//Menu
Route::get('home/{id}', [HomeController::class, 'index'])->name('home');

// Refresh
Route::get('/orderDetail', [HomeController::class, 'refresh'])->name('refresh');

// Last Order (Base on table ID)
Route::get('lastOrder/{id}', [HomeController::class, 'last_order'])->name('last.order');

// Auth Check
Route::get('/auth/check', function () {
    return response()->json([
        'authenticated' => auth()->check(),
        'role' => auth()->check() ? auth()->user()->role : null,
    ]);
})->name('auth.check');

// Auto Logout
Route::get('unload/logout',[HomeController::class, 'unloadLogout'])->name('unload.logout');

// 404 Error
Route::fallback(function () {
    return view('404');
});