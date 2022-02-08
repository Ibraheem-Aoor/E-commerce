<?php

namespace App\Http\Livewire\Admin\Sale;

use App\Models\Sale;
use Livewire\Component;

class SaleDate extends Component
{
    public $status , $date;
    public function render()
    {
        return view('livewire.admin.sale.sale-date')->layout('layouts.admin.base');
    }

    public function setSaleDate()
    {
        $this->validate(['status'=>'numeric|nullable'] , ['status.numeric' => 'Choose valid status']);
        $saleObject =  Sale::findOrFail(1);
        $saleObject->status = $this->status;
        $saleObject->date = $this->date;
        $saleObject->save();
        session()->flash('success' ,'Sales Date Updated Successfully');
    }
}
