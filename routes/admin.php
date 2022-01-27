<?php

use App\Http\Livewire\About;
use App\Http\Livewire\Admin\Category\AddCategory;
use App\Http\Livewire\Admin\Category\Categories;
use App\Http\Livewire\Admin\Category\EditCategory;
use App\Http\Livewire\Admin\Product\AddProduct;
use App\Http\Livewire\Admin\Product\Products;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Home;
use App\Http\Livewire\Shop;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\UserManagment\User;

// Prefix => admin
    Route::group(['middleware' => ['auth' , 'authAdmin'] ] , function()
    {
        Route::any('dashboard' , Dashboard::class)->name('admin.dashboard');
        Route::get('categories' , Categories::class)->name('admin.categories');
        Route::get('categories-add' , AddCategory::class )->name('admin.categories.add');
        Route::get('categories-edit/{id}' , EditCategory::class)->name('admin.categories.edit');
        Route::get('products' , Products::class)->name('admin.products');
        Route::get('products-add' , AddProduct::class)->name('admin.products.add');
        Route::get('user-managment' , User::class)->name('admin.users.show');
    });
