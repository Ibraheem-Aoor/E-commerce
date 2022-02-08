<?php
namespace App\Helpers\Checkout;

use App\Http\Livewire\User\Auth\Checkout;
use App\Models\Order as ModelsOrder;
use App\Models\OrderItem;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class Order extends CheckoutHelper
{
    // Attributes
    public $orderId;

    /* Start public metohds */

// creating order in DB and create it's items in order-items table
    public function makeOrder()
    {
        $this->orderId = $this->createOrder();
        $this->listOrderItmes();
        return $this->orderId;
    }

    public function createOrder()
    {
        $orderRecord =  ModelsOrder::create([
            'user_id' => Auth::id(),
            'firstname' => $this->checkout->firstName ,
            'lastname' => $this->checkout->lastName ,
            'mobile' => $this->checkout->mobile ,
            'email' => $this->checkout->email ,
            'line_1' => $this->checkout->address_1,
            'line_2' => $this->checkout->address_2,
            'city' => $this->checkout->city ,
            'country' => $this->checkout->country,
            'zipcode' => $this->checkout->zipCode,
            'status' => 'ordered' ,
            'province' => $this->checkout->city,
            'subtotal' => session()->get('data')['subtotal'],
            'discount' => session()->get('data')['discount'],
            'tax' => session()->get('data')['tax'],
            'total' => session()->get('data')['total'],
            'is_shipping_different' => $this->checkout->diffShippingAddress,
        ]);
        return $orderRecord->id;
    }

// create records with the items after adding them
    public function listOrderItmes()
    {
        foreach(Cart::instance('cart')->content() as $product)
        {
            OrderItem::create
            ([
                'order_id' => $this->orderId,
                'product_id' => $product->id,
                'price' =>  $product->price,
                'quantity' => $product->qty,
            ]);
        }
    }

}
