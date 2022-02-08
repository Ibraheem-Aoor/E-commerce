<?php

namespace App\Http\Livewire\User\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Component
{
    public function mount($id =null)
    {

    }
    public function render()
    {
        $products = Cart::instance('wishlist')->content();
        return view('livewire.user.auth.wishlist' , ['products' => $products])->extends('layouts.master')->section('content');
    }



// Store item to user's ShoppingCart
    public  function moveToCard($rowId)
    {
        if(!Auth::check())
            return redirect(route('login'));
        $product  = Cart::instance(Auth::id())->get($rowId);
        Cart::instance('cart')->add($product->id, $product->name, 1, 20)->associate('App\Models\Product');
        session()->flash('success' , 'product moved to cart');
    }

// Remove from wishlist
    public function removeFromWishlist($productId)
    {
        foreach(Cart::instance('wishlist')->content() as $temp)
        {
            if($temp->id == $productId)
            {
                Cart::instance('wishlist')->remove($temp->rowId);
            }
        }
    }

}
