<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Transaction as ModelsTransaction;
use Livewire\Component;

class Transaction extends Component
{
    public function render()
    {
        $trasactions = ModelsTransaction::with('user')->paginate(7);
        return view('livewire.admin.orders.transaction' , ['transactions' => $trasactions])->layout('layouts.Admin.base');
    }
}
