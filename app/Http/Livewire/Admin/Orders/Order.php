<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order as ModelsOrder;
use Livewire\Component;

class Order extends Component
{
    public $orderNewStatus , $orderId;

    public function changeOrderStatus()
    {
        $data  = ModelsOrder::findOrFail($this->orderId);
        return dd($data);
    }

    public function render()
    {
        $allOrders = ModelsOrder::paginate(7);
        return view('livewire.admin.orders.order' , ['orders' =>$allOrders])->layout('layouts.Admin.base');
    }

}
