<?php

use App\Http\Livewire\About;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Category;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Details;
use App\Http\Livewire\Home;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Test;
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

// public routes "Without middleware"
Route::get('/' , Home::class )->name('home');
Route::get('/shop' , Shop::class )->name('shop');
Route::get('/cart' , Cart::class , 'render' )->name('cart');
Route::get('/about-us' , About::class )->name('about');
Route::get('/checout' , Checkout::class )->name('checkout');
Route::get('/contact' , Contact::class )->name('contact');
Route::get('/details/{id}' , Details::class )->name('product.details');
Route::get('/details/details/{smth?}/{id}' , Details::class );
Route::get('/category/{id}' , Category::class )->name('category');



// Route::group([ 'middleware'=> ['auth:sanctum', 'verified' ,'authAdmin']  , 'prefix'=>'admin'] , function()
// {
//     Route::get('/dashboard' , function(){return dd("Admin dashboard");});
//     Route::get('/categories');
// });
