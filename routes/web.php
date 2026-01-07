<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//home
Route::get('/home',[HomeController::class,'index']);

//Admin
Route::get('/add_coffee',[AdminController::class,'add_coffee']);

Route::post('/upload_coffee',[AdminController::class,'upload_coffee']);

Route::get('/view_coffee',[AdminController::class,'view_coffee']);

Route::get('/delete_coffee/{id}',[AdminController::class,'delete_coffee']);

Route::get('/edit_coffee/{id}', [AdminController::class, 'edit_coffee']);

Route::post('/update_coffee/{id}', [AdminController::class, 'update_coffee'])->name('update.coffee');

Route::get('/all_orders', [AdminController::class, 'all_orders']);

Route::get('/update_status/{id}/{status}', [AdminController::class, 'update_status']);

Route::get('/order_search', [AdminController::class, 'order_search']);

Route::get('/toggle_status/{id}', [AdminController::class, 'toggle_status']);

//Cart
Route::get('/cart', [CartController::class, 'show_cart'])->name('user.cart');

Route::post('/add_cart/{id}', [CartController::class, 'add_cart'])->name('add.cart');

Route::get('/remove_cart/{id}', [CartController::class, 'remove_cart']);

Route::get('/update_quantity/{id}/{action}', [CartController::class, 'update_quantity']);

//Checkout
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('/confirm_order', [CartController::class, 'confirm_order'])->name('confirm.order');

//Order
Route::get('/my-orders', [CartController::class, 'view_orders'])->name('user.orders');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
