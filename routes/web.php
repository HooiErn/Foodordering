<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
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
Route::get('admin/food',[AdminController::class, 'food']);
Route::post('admin/addFood',[AdminController::class, 'addFood']);
Route::post('admin/updateFood',[AdminController::class, 'updateFood'])->name('update.food');
Route::get('admin/deleteFood/{id}',[AdminController::class, 'deleteFood']);
//Category
Route::post('admin/addCategory',[AdminController::class,'addCategory']);
Route::get('admin/deleteCategory/{id}',[AdminController::class, 'deleteCategory']);
Route::post('admin/updateCategory',[AdminController::class,'updateCategory']);
//Others
Route::get('changeStatus/{id}',[AdminController::class, 'changeStatus']);

//Table
Route::get('admin/table',[AdminController::class, 'table']);
Route::get('admin/addTable',[AdminController::class, 'addTable']);
Route::get('admin/deleteTable/{id}',[AdminController::class, 'deleteTable']);
//Test
Route::get('admin/test',[AdminController::class,'test']);

//Category
//Add
Route::get('category/addForm', [CategoryController::class, 'addForm']);
Route::post('category/addForm', [CategoryController::class, 'add'])->name('category.add');
//Edit
Route::get('category/editForm/{id}',[CategoryController::class, 'editForm'])->name('category.edit');
Route::post('category/editForm',[CategoryController::class, 'update'])->name('category.update');
//Delete
Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('delete.category');

//Food
//Add
Route::get('food/addForm', [FoodController::class, 'addForm']);
Route::post('food/addForm', [FoodController::class, 'add'])->name('food.add');
//Edit
Route::get('food/editForm/{id}',[FoodController::class, 'editForm'])->name('food.edit');
Route::post('food/editForm',[FoodController::class, 'update'])->name('food.update');
//Delete
Route::get('food/delete/{id}',[FoodController::class, 'delete'])->name('delete.food');
//View
Route::get('food/view/{id}',[FoodController::class, 'view'])->name('view.food');

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
Route::get('/viewCart', [CartController::class, 'view'])->name('viewCart');
//Delete
Route::get('cart/delete/{id}',[CartController::class, 'delete'])->name('delete.cart.food');

//Payment
Route::post('/checkout', [PaymentController::class, 'paymentPost'])->name('payment.post');

Route::get('login', [AuthController::class, 'index']);
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');

//Payment
Route::post('/checkout', [PaymentController::class, 'paymentPost'])->name('payment.post');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');