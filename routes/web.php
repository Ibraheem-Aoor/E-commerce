<?php

use App\Http\Controllers\LangController;
use App\Http\Livewire\About;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\User\Auth\Cart;
use App\Http\Livewire\User\Auth\Checkout;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Details;
use App\Http\Livewire\Home;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Test;
use App\Http\Livewire\User\Auth\ThankYou;
use App\Http\Livewire\User\Auth\Wishlist;
use App\Models\Shipping;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\Auth\Order;
use App\Http\Livewire\User\Auth\UpdateProfile;
use App\Http\Livewire\User\Auth\UpdateUserPassword;
use App\Http\Livewire\User\Auth\UserProfile;
use App\Http\Controllers\PayPalController;
use App\Http\Livewire\Admin\layouts\Nav;
use App\Http\Livewire\User\Auth\UserOrderDetail;
use App\Models\User;

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

// public routes
Route::get('/' , Home::class )->name('home');
Route::get('/shop' , Shop::class )->name('shop');
Route::get('/about-us' , About::class )->name('about');
Route::get('/contact' , Contact::class )->name('contact');
Route::get('/details/{id}' , Details::class )->name('product.details');
Route::get('/details/details/{smth?}/{id}' , Details::class );
// Route::get('/category/{id}' , Category::class )->name('category');

Route::middleware(['auth'])->group(function () {
// Cart & Checkout
    Route::get('/cart' , Cart::class , 'render' )->name('cart');
    Route::get('wishlist' , Wishlist::class )->name('wishlist');
    Route::get('/checkout' , Checkout::class )->name('checkout');
    Route::get('/thank-you' , ThankYou::class, 'render' )->name('thanks');
// Orders
    Route::get('orders' , Order::class)->name('user.orders');
    Route::get('order/detaisl/{id}' , UserOrderDetail::class)->name('user.order.details');

// Profile
    Route::get('profile' , UserProfile::class)->name('user.profile');
    Route::get('profile-update' ,UpdateProfile::class )->name('user.profile.update');
    Route::get('password-update' ,UpdateUserPassword::class )->name('user.password.update');


// PayPal Routes
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

});

Route::get('/lang', [LangController::class  , 'changeLang'])->name('lang.change');
Route::get('/test' , function()
{
    $users = User::pluck('id')->all();
    return dd($users);
});


// Route::group([ 'middleware'=> ['auth:sanctum', 'verified' ,'authAdmin']  , 'prefix'=>'admin'] , function()
// {
//     Route::get('/dashboard' , function(){return dd("Admin dashboard");});
//     Route::get('/categories');
// });
