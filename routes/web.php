<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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

//Admin Login & Logout
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::get('admin/logout', [AdminController::class, 'logout']);

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');