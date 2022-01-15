<?php

use App\Http\Livewire\About;
use App\Http\Livewire\Admin\Category\AddCategory;
use App\Http\Livewire\Admin\Category\Categories;
use App\Http\Livewire\Admin\Category\EditCategory;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Home;
use App\Http\Livewire\Shop;
use Illuminate\Support\Facades\Route;


    Route::group(['middleware' => ['auth' , 'authAdmin'] ] , function()
    {
        Route::get('dashboard' , function(){return "Admin dashboard";});
        Route::get('categories' , Categories::class)->name('admin.categories');
        Route::get('categories-add' , AddCategory::class )->name('admin.categories.add');
        Route::any('categories-edit/{id}' , EditCategory::class)->name('admin.categories.edit');
    });
