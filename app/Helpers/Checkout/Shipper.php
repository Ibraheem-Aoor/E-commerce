<?php
namespace App\Helpers\Checkout;

use App\Http\Livewire\User\Auth\Checkout;
use App\Models\Shipping;

class Shipper extends CheckoutHelper
{
    // Attributes

    /* Start public methods */

// Make the shipping (Creating record in DB)
    public function makeShipping()
    {
        if($this->checkout->diffShippingAddress == 1)
            $this->shippToDifferentAddress();
        else
            $this->shippToSameAddress();
    }

    // using the second address attributes to create a shipping to diffrenet address
    public function shippToDifferentAddress()
    {
        Shipping::create([
            'firstname' => $this->checkout->secondFirstName ,
            'lastname' => $this->checkout->secondLastName ,
            'mobile' => $this->checkout->secondMobile ,
            'email' => $this->checkout->secondEmail ,
            'line_1' => $this->checkout->secondAddress_1,
            'line_2' => $this->checkout->secondAddress_2,
            'city' => $this->checkout->secondCity ,
            'country' => $this->checkout->secondCountry,
            'zipcode' => $this->checkout->secondZipCode,
            'province' => $this->checkout->secondCity,
            'order_id' => $this->checkout->orderId,
        ]);
    }

    // using the address attributes to create a shipping recored
    public function shippToSameAddress()
    {
        Shipping::create([
            'firstname' => $this->checkout->firstName ,
            'lastname' => $this->checkout->lastName ,
            'mobile' => $this->checkout->mobile ,
            'email' => $this->checkout->email ,
            'line_1' => $this->checkout->address_1,
            'line_2' => $this->checkout->address_2,
            'city' => $this->checkout->city ,
            'country' => $this->checkout->country,
            'zipcode' => $this->checkout->zipCode,
            'province' => $this->checkout->city,
            'order_id' => $this->checkout->orderId,
        ]);
    }
}
