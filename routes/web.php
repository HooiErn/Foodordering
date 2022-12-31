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
Route::get('viewOrder/{name}',[AdminController::class, 'viewTakenOrder']);
Route::get('viewCart/{orderID}',[AdminController::class, 'viewCart']);

// --- Waiter ---
Route::get('admin/waiter',[AdminController::class, 'waiter']);
Route::post('admin/registerWaiter',[AdminController::class, 'registerWaiter']);

//Table 
Route::get('admin/table',[AdminController::class, 'table']);
Route::get('admin/addTable',[AdminController::class, 'addTable']);
Route::get('admin/deleteTable/{id}',[AdminController::class, 'deleteTable']);
//Test
Route::get('admin/test',[AdminController::class,'test']);

//Waiter login and logout
Route::get('waiter/login', [WaiterController::class, 'login']);
Route::post('waiter/login', [WaiterController::class, 'check_login']);
Route::get('waiter/logout', [WaiterController::class, 'logout']);
Route::get('takeOrder', [WaiterController::class, 'takeOrder']);

//Waiter
// --- Dashboard ---
Route::get('waiter/scan',[WaiterController::class, 'scan']);


//View Food
Route::get('food/view/{id}',[FoodController::class, 'view'])->name('view.food');
Route::post('/menu',[App\Http\Controllers\FoodController::class, 'searchFood'] ) ->name('search.food');
Route::get('menu',[FoodController::class, 'menu'])->name('menu');

//Select Categories
Route::get('/all',[App\Http\Controllers\FoodController::class, 'viewAll'] ) ->name('All.food');
Route::get('/drink',[App\Http\Controllers\FoodController::class, 'viewDrink'] ) ->name('drink.food');
Route::get('/noodles',[App\Http\Controllers\FoodController::class, 'viewNoodles'] ) ->name('noodles.food');
Route::get('/dessert',[App\Http\Controllers\FoodController::class, 'viewDessert'] ) ->name('dessert.food');
Route::get('/rice',[App\Http\Controllers\FoodController::class, 'viewRice'] ) ->name('Rice.food');

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

//Print
Route::get('print', [AdminController::class, 'print'])->name('print.receipt');

Auth::routes();

//Menu
Route::get('/home/{id}', [HomeController::class, 'index'])->name('home');

