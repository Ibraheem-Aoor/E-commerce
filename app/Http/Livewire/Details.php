<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\CartItem;
// use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\CartItemOptions;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Gloudemans\Shoppingcart\Cart;

class Details extends Component
{

    /* Start Attributes */
    public $product , $relatedProducts , $poularProducts;
    public $test;
    /* End Attributes */


    //Constructor
    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
        $this->poularProducts = Product::inRandomOrder()->limit(4)->get();
        $this->relatedProducts = Product::where([
                        ['category_id' , '=' , $this->product->category_id ],
                        [ 'id' , '!='  , $this->product->id]
                        ])->inRandomOrder()->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.details',
            [
                'product'=>$this->product ,
                'popularProducts'=> $this->poularProducts ,
                'relatedProducts' => $this->relatedProducts ,
            ])->extends('layouts.master')->section('content');
    }

    public  function storeItem($productId , $productName, $ProductPrice)
    {
        if(!Auth::check())
            return redirect(route('login'));
        Cart::add($productId, $productName, 1, $ProductPrice)->associate(Product::class); //default Quntiaty is 1;
        session()->flash('ProductAddedToCart' , 'Product Added Successfully');
        return redirect(route('cart'));
    }
}
