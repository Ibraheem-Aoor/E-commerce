<?php
namespace App\Helpers\Checkout;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
class CheckoutHelper
{
    /*
        This is the super class for all other checkout helpers
    */

// Attributes
    public $checkout; // Holds the checkout data.

// constructors
    public function __construct($checkout)
    {
        $this->checkout = $checkout;
    }
}
