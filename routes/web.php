<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


// Public routes

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//  Admin routes
Route::middleware(['is_admin'])->group(function () {

    // Dashboard routes
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.adminDashboard');

    // product routes
    Route::get('admin/products/all', [ProductController::class, 'allProducts'])->name('view.products');
    Route::get('admin/product/add', [ProductController::class, 'add'])->name('add.product');
    Route::post('admin/product/create', [ProductController::class, 'create'])->name('create.product');
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete'])->name('delete.product');
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('admin/product/update/{id}', [ProductController::class, 'update']);
});


// Consumer View

// Search product
Route::post('admin/product/search', [HomeController::class, 'searchResults'])->name('search.product');

// Cart management
Route::get('/cart', [CartController::class, 'index'])->name('view.cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.cart');
Route::patch('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');
Route::delete('/remove-from-cart', [CartController::class, 'deleteCart'])->name('delete.cart');

// Consumer Profile
Route::get('/consumer/profile',[UserController::class,'index'])->name('consumer.profile');
Route::post('/consumer/profile/update',[UserController::class,'profileUpdate'])->name('profile.update');