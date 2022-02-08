<?php

namespace App\Http\Livewire\User\Auth;

use App\Helpers\Checkout\Order as HelpersOrder;
use App\Models\Coupon;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Checkout\Shipper;
use App\Helpers\Checkout\Transactor;
use Livewire\Component;

class Checkout extends Component
{
    // Attributes (will be used in all cases)
    public $firstName , $lastName , $email ,
    $mobile , $address_1 , $address_2 ,
    $city , $country , $zipCode,
    $diffShippingAddress = 0 , $paymentMethod ;

    // Attributes (will be used only if there is a different shipping Address)
    public $secondFirstName , $secondLastName , $secondEmail ,
            $secondMobile , $secondAddress_1 , $secondAddress_2 ,
            $secondCity , $secondCountry , $secondZipCode;

    public $cardNumber , $cardExpYear , $cardExpMonth ,  $cardCVC;

    public $orderId;

    /* Start public methods */

// making an order (Ordering - shipping - paying & transacting)
    public function placeOrder()
    {
        $this->validate($this->orderRules());
        $shipper = new Shipper($this);
        $order = new HelpersOrder($this);
        $this->orderId = $order->makeOrder();
        $this->pay();//making transactions here
        $shipper->makeShipping();
        $this->clearCart();
        session()->forget('data');
        return redirect(route('thanks'));
    }

// making the payment
    public function pay()
    {
        $transactor = new Transactor($this);
        $transactor->makeTransaction();
    }
// Clearing the cart (Only After Successfull payment)
    public function clearCart()
    {
        Cart::instance('cart')->destroy();
    }

// Validation rules
    public function orderRules()
    {
        return[
            'firstName' => 'required|string|max:255',
            'lastName'  => 'required|string|max:255',
            'email'  => 'required|email',
            'mobile'  => 'required|numeric',
            'address_1'  => 'required|string|max:255',
            'address_2'  => 'nullable|string|max:255',
            'city'  => 'required|string|max:255',
            'country'  => 'required|string|max:255',
            'zipCode'  => 'required|numeric',
            'paymentMethod'  => 'required|string',
        ];
    }

    public function validateCardData()
    {
        $this->validate([
            'cardNumber' =>'required',
            'cardExpYear' =>'required|numeric' ,
            'cardExpMonth' =>'required|numeric' ,
            'cardCVC' =>'required|numeric' ,
        ]);
    }

    public function render()
    {
        return view('livewire.user.auth.checkout')->extends('layouts.master')->section('content');
    }
}
