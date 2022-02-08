<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\Order as ModelsOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Order extends Component
{

    public function cancelOrder($id)
    {
        $order = ModelsOrder::where([
                        ['user_id' , Auth::id()] ,
                        ['id' , $id]]
                    )->first();
        $order->status = 'canceled';
        $order->save();
        session()->flash('success' , 'order has been canceled');
    }

    public function render()
    {
        $allUserOrder = ModelsOrder::where('user_id' , Auth::id())->paginate(7);
        return view('livewire.user.auth.order' , ['orders' => $allUserOrder])->extends('layouts.master')->section('content');
    }
}
