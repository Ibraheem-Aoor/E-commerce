<?php
namespace App\Helpers\Checkout;

use App\Http\Livewire\User\Auth\Checkout;
use App\Models\Transaction;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Exception;
use Illuminate\Support\Facades\Auth;

class Transactor extends CheckoutHelper
{
// Attributes
    public $mode , $status='pending';


    /* Start public methods */
    public function makeTransaction()
    {
        if($this->checkout->paymentMethod == 'card')
            $this->payWithCreditCard();
        Transaction::create([
            'user_id' => Auth::id(),
            'order_id' => $this->checkout->orderId,
            'mode' => $this->checkout->paymentMethod,
            'status' => $this->status,
        ]);
    }



    public function payWithCreditCard()
    {
        $this->checkout->validateCardData();
        $stripe = Stripe::make(env('STRIPE_KEY' , 'pk_test_51KP0UQHgEPYhMzN7seAcDXqJXRCsekmrzKMzt43vKzQmvHXoRsxdHCD2qqIp1JIbz2TugPW0zbLbHugGv2CNM5AD00iJ5U7WK8'));
        try{
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $this->checkout->cardNumber,
                    'exp_month' => $this->checkout->cardExpMonth,
                    'exp_year' => $this->checkout->cardExpYear,
                    'cvc' => $this->checkout->cardCVC,
                ],
                ]);
            if(!isset ($token['id']))
            {
                session()->flash('error', 'stripe token cant be generated');
                return dd('error in transaction');
            }else
            {

                // create customer data
                $customer = $stripe->customers()->create([
                    'name' => $this->checkout->firstName .' '.$this->checkout->lastName ,
                    'email' => $this->checkout->email ,
                    'phone' => $this->checkout->mobile,
                    'address' =>[
                        'line1' => $this->checkout->address_1,
                        'postal_code' => $this->checkout->zipCode,
                        'city' => $this->checkout->city,
                        'state' => $this->checkout->country,
                        'province' => $this->checkout->country,
                    ],
                    'shipping' => [
                        'name' => $this->checkout->firstName .' '.$this->checkout->lastName ,
                        'address' =>[
                            'line1' => $this->checkout->address_1,
                            'postal_code' => $this->checkout->zipCode,
                            'city' => $this->checkout->city,
                            'state' => $this->checkout->country,
                            'province' => $this->checkout->country,
                        ],
                    ],
                    'source' => $token['id'],

                ]);

                // create charge data
                $charge =  $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount' => session()->get('data')['total'],
                    'description' => 'Payment for order no '.$this->checkout->orderId,
                ]);
                if($charge['status'] == 'succeeded')
                {
                    $this->setStatus('approved');
                }
                else{
                    session()->flash('error','Error in Transaction!');
                    return dd('error in transaction');
                }
            }

            }catch(Exception $e)
            {
                return dd($e->getMessage());
            }
        }


        public function setStatus($status)
        {
            $this->status = $status;
        }

}
