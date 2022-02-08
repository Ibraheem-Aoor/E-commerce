<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;

class OrderDetails extends Component
{
    // Attributes
    public $order;

    public function mount($id = null)
    {
        $this->order = Order::with('shipping')->findOrFail($id);
        // return dd($this->order);
    }

    public function render()
    {
        return view('livewire.admin.orders.order-details')->layout('layouts.Admin.base');
    }
}
