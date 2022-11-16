<?php

use App\Http\Controllers\accountcontroller;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\locallizationcontroller;
use App\Http\Controllers\messageconttroller;
use App\Http\Controllers\namelangcontrolle;
use App\Http\Controllers\othercontroller;
use App\Http\Controllers\productscotroller;
use App\Models\namelang;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[Homecontroller::class, 'welcome']);

Auth::routes(['verify'=>true]);


Route::get('/home', [App\Http\Controllers\Homecontroller::class, 'index'])->name('home');


Route::get('lang/{locale}', [locallizationcontroller::class,'switchlang'])->name('lang');

Route::resource('/message',messageconttroller::class);
Route::resource('/products',productscotroller::class);
Route::resource('/admin',namelangcontroller::class); 
Route::post('checkout', [cartcontroller::class, 'order'])->name('checkout');
Route::get('wish', [cartcontroller::class, 'wishlist'])->name('wish');
Route::get('cart', [cartcontroller::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}',[cartcontroller::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart',[cartcontroller::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart',[cartcontroller::class, 'remove'])->name('remove.from.cart');
// accounts
Route::get('account',[accountcontroller::class,'myaccount']);
Route::get('my-products',[accountcontroller::class,'prod']);
Route::get('finance',[accountcontroller::class,'finance']);
Route::get('/search',[othercontroller::class,'search']);
Route::get('order',[othercontroller::class,'orders']);
Route::get('/plants',[othercontroller::class,'plants']);
Route::get('/livestock',[othercontroller::class,'livestock']);
Route::get('/names',[othercontroller::class,'names']);
