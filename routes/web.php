<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth;
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

// Route::group(['middleware' => 'prevent-back-history'],function(){

// 	Auth::routes();

// 	Route::get('/home', 'HomeController@index');

// });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.adminDashboard')->middleware('is_admin');

//Admin Product
Route::get('admin/products/all',[ProductController::class,'allProducts'])->name('view.products');
Route::get('admin/product/add',[ProductController::class,'add'])->name('add.product');
Route::post('admin/product/create',[ProductController::class,'create'])->name('create.product');
Route::get('admin/product/delete/{id}',[ProductController::class,'delete'])->name('delete.product');
Route::get('admin/product/edit/{id}',[ProductController::class,'edit']);
Route::post('admin/product/update/{id}',[ProductController::class,'update']);