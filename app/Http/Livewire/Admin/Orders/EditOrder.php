<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\Shipping;
use Livewire\Component;

class EditOrder extends Component
{
    public $order , $orderNewStatus;

    public function mount($id = null)
    {
        $this->order = Order::findOrFail($id);
        $this->orderNewStatus = $this->order->status;
    }

    public function updateOrderStatus()
    {
        $this->order->update([
            'status' => $this->orderNewStatus
        ]);
        session()->flash('success' , 'Order Status has been updated Successfully');
    }

    public function render()
    {
        return view('livewire.admin.orders.edit-order')->layout('layouts.Admin.base');
    }
}
