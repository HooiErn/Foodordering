<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Auth\LoginController;

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
    return view('welcome');
});
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'postLogin'])->name('login.post');
Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');

//Admin Login & Logout
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

//Admin DashBoard
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

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

//Rating
Route::post('/add-rating', [RatingController::class, 'rating']);

// Customer
Route::get('profile',[AdminController::class, 'profile'])->name('profile');
Route::get('transactionHistory',[AdminController::class, 'transactionHistory'])->name('view.transactionHistory');
Route::get('Transfer',[AdminController::class, 'transfer'])->name('transfer');
Route::get('QrScan',[AdminController::class, 'QrScan'])->name('QrScan');
Route::get('MemberRegistration',[AdminController::class, 'MemberRegistration'])->name('member.register');
Route::get('BranchRegistration',[AdminController::class, 'BranchRegistration'])->name('branch.register');
Route::get('AgentsRegistration',[AdminController::class, 'AgentsRegistration'])->name('agent.register');
Route::post('/menu',[App\Http\Controllers\FoodController::class, 'searchFood'] ) ->name('search.food');

Route::get('/drink',[App\Http\Controllers\FoodController::class, 'viewDrink'] ) ->name('drink.food');
Route::get('/fastFood',[App\Http\Controllers\FoodController::class, 'viewFastFood'] ) ->name('fastFood.food');
Route::get('/dessert',[App\Http\Controllers\FoodController::class, 'viewDessert'] ) ->name('dessert.food');
Route::get('/mainDishes',[App\Http\Controllers\FoodController::class, 'viewMainDishes'] ) ->name('mainDishes.food');
Route::get('/foodDetail/{id}',[FoodController::class,'foodDetail'])->name('food.detail');
//Cart
//Add
Route::post('/add-to-cart',[CartController::class, 'addCart']);
//View
Route::get('/viewCart', [CartController::class, 'view']);

//Menu
Route::get('menu',[AdminController::class, 'menu'])->name('menu');

//Payment
Route::post('/checkout', [PaymentController::class, 'paymentPost'])->name('payment.post');

Auth::routes();

Route::get('/home', [LoginController::class, 'home'])->name('home');