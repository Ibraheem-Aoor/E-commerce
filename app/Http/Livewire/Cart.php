<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as C;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{

// registering listeners
    public $listeners = ['increaseQty'  ,'reduceQty' , 'destroyCart' , 'deleteItem'];

    public function mount($id = null)
    {
        // redirect if user isn't authenticated
        if(!Auth::check())
            return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.cart')->extends('layouts.master')->section('content');
    }

// Deleting item from the card
    public function deleteItem($rowId)
    {
        C::remove($rowId);
        session()->flash('ItemRemoved' , 'Item has been removed successfully');
    }


    // Product Quantity manipulating
    public function increaseQty($rowId)
    {
        $product = C::get($rowId);// returnning product object
        $newQty = $product->qty+1;
        C::update($rowId , $newQty);
    }

    public function reduceQty($rowId)
    {
        $product = C::get($rowId);
        $newQty = $product->qty - 1;
        if($newQty == 0)
        {
            C::remove($rowId);
            return ;
        }
        C::update($rowId , $newQty);
    }

    

    // Clearing the cart
    public  function destroyCart()
    {
        C::destroy();
        session()->flash('destroied' , 'Cart Destroied Successfully');
    }

}
