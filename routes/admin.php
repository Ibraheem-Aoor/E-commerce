<?php

use App\Http\Livewire\About;
use App\Http\Livewire\Admin\Category\AddCategory;
use App\Http\Livewire\Admin\Category\CategoryComponent;
use App\Http\Livewire\Admin\Category\EditCategory;
use App\Http\Livewire\Admin\Category\HomePageCategory;
use App\Http\Livewire\Admin\Coupons\AddCoupon;
use App\Http\Livewire\Admin\Coupons\Coupon;
use App\Http\Livewire\Admin\Coupons\EditCoupon;
use App\Http\Livewire\Admin\Product\AddProduct;
use App\Http\Livewire\Admin\Product\Products;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Home;
use App\Http\Livewire\Shop;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Orders\EditOrder;
use App\Http\Livewire\Admin\Orders\Order;
use App\Http\Livewire\Admin\Orders\OrderDetails;
use App\Http\Livewire\Admin\Orders\Transaction;
use App\Http\Livewire\Admin\Product\EditProduct;
use App\Http\Livewire\Admin\UserManagment\User;
use App\Http\Livewire\Admin\Sale\SaleDate;


// Prefix => admin
    Route::group(['middleware' => ['auth' , 'authAdmin'] ] , function()
    {
        Route::any('dashboard' , Dashboard::class)->name('admin.dashboard');

        Route::get('categories' , CategoryComponent::class)->name('admin.categories');
        Route::get('categories-add' , AddCategory::class )->name('admin.categories.add');
        Route::get('categories-edit/{id}' , EditCategory::class)->name('admin.categories.edit');
        Route::get('home-categories-add' , HomePageCategory::class )->name('admin.home.categories');

        Route::get('products' , Products::class)->name('admin.products');
        Route::get('products-add' , AddProduct::class)->name('admin.products.add');
        Route::get('product-edit/{id}' , EditProduct::class)->name('admin.products.edit');

        Route::get('user-managment' , User::class)->name('admin.users.show');

        Route::get('sale-date-managment' , SaleDate::class)->name('admin.sale.date');
        Route::get('/coupons' ,Coupon::class)->name('admin.coupons');
        Route::get('/coupons-add' , AddCoupon::class)->name('admin.coupons.add');
        Route::get('/coupons-edit/{id}' , EditCoupon::class)->name('admin.coupons.edit');

        Route::get('/orders'  , Order::class)->name('admin.orders');
        Route::get('/order-details/{id}'  , OrderDetails::class)->name('admin.orders.deatils');
        Route::get('/order-update/{id}'  , EditOrder::class)->name('admin.order.edit');
        Route::get('/transactions' , Transaction::class)->name('admin.transactions');
    });
