<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\Coupon;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as C;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
// Attributes
    public  $haveCoupon , $couponCode , $couponObject ,
            $dsicountAmount , $subtotalAfterDiscount , $totalAfterDiscount ,
            $taxAfterDiscount , $couponFlag = 0;

// registering listeners
    public $listeners = ['increaseQty'  ,'reduceQty' , 'destroyCart' , 'deleteItem'];

    public function mount($id = null)
    {
        if(Auth::check())
            C::instance('cart')->store(Auth::id());
    }




// Deleting item from the card
    public function deleteItem($rowId)
    {
        C::instance('cart')->remove($rowId);
        session()->flash('success' , 'Item has been removed successfully');
    }


    // Product Quantity manipulating
    public function increaseQty($rowId)
    {
        $product = C::instance('cart')->get($rowId);// returnning product object
        $newQty = $product->qty+1;
        C::update($rowId , $newQty);
    }


    public function reduceQty($rowId)
    {
        $product = C::instance('cart')->get($rowId);
        $newQty = $product->qty - 1;
        if($newQty == 0)
        {
            $newQty = 1;
            return ;
        }
        C::update($rowId , $newQty);
    }



// Clearing the cart
    public  function destroyCart()
    {
        C::instance('cart')->destroy();
        session()->flash('success' , 'Cart Destroied Successfully');
    }

// For Coupon Code
    public function applyCode()
    {
        if($this->couponCode != null && $this->isCodeExists())
        {
            if($this->couponObject->exprie_date <= now())
            {
                session()->flash('error' , 'Code is Expired');
            }
            elseif( C::instance('cart')->subtotal() < ($val = $this->couponObject->cart_value))
                session()->flash('error' , 'Code Active only for carts with total of '.$val.'$ or more!');
            else
            {
                $this->calcDiscount();
                $this->couponFlag = 1;
                session()->flash('success' , 'Coupon Applied Successfully!');
            }
        }
        else
            session()->flash('error' , 'Invalid Coupon Code');
    }

// Check if the code exists and assign couponObject to it if it exists
    public function isCodeExists()
    {
        $coupon = Coupon::where('code' , $this->couponCode)->first();
        if($coupon != null)
        {
            $this->couponObject = $coupon;
            return true;
        }
        return false;
    }

// Calculate the discount amount form the coupon
    public function calcDiscount()
    {
        $this->setDiscountAmount();
        $this->subtotalAfterDiscount = C::instance('cart')->subtotal() - $this->dsicountAmount;
        $this->taxAfterDiscount = ( $this->subtotalAfterDiscount *  config('cart.tax') ) /100;
        $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
    }

    public function setDiscountAmount()
    {
        if(strcmp($this->couponObject->type , "fixed") == 0)
            $this->dsicountAmount = $this->couponObject->value;
        else
            $this->dsicountAmount = ( $this->couponObject->value * C::instance('cart')->subtotal() ) /100;
    }

    public function checkout()
    {
        $cart = C::instance('cart');
            session()->put('data' ,[
                'discount' => $this->couponFlag == 1 ?  $this->dsicountAmount : 0,
                'subtotal' => $this->couponFlag == 1 ?  $this->subtotalAfterDiscount : $cart->subtotal(),
                'tax' => $this->couponFlag == 1 ?  $this->taxAfterDiscount : $cart->tax(),
                'total' => $this->couponFlag == 1 ?  $this->totalAfterDiscount : $cart->total(),
            ]);
        return redirect(route('checkout') );
    }

    public function render()
    {
        $mostViewdProducts = Product::inRandomOrder()->limit(10)->lazyById(5);
        return view('livewire.user.auth.cart'  , ['mostViewdProducts' => $mostViewdProducts])->extends('layouts.master')->section('content');
    }
}
