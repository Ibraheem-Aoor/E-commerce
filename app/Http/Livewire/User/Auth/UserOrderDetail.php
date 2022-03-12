<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\OrderItem;
use Livewire\Component;

class UserOrderDetail extends Component
{
    public $orderItems , $orderTotal;


    public function mount($id = null)
    {
        $this->orderItems = OrderItem::with('product')->where('order_id' , $id)->get();
        $this->orderTotal  = $this->orderItems->sum('price');
    }

    public function render()
    {
        return view('livewire.user.auth.user-order-detail')->extends('layouts.master')->section('content');
    }
}
