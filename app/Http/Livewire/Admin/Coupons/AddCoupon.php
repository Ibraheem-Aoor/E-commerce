<?php

namespace App\Http\Livewire\Admin\Coupons;

use Livewire\Component;
use App\Models\Coupon;

class AddCoupon extends Component
{

    public $code , $type , $couponValue , $cartValue , $expireDate;
    public function addNewCoupon()
    {
        $this->validate($this->rules());
        $this->createNewCoupon();
        session()->flash('success' , 'Coupon Added Successfully');

    }

    public function rules()
    {
        return [
            'code' => 'required|string|max:40',
            'type' => 'required',
            'couponValue' => 'required|numeric',
            'cartValue' => 'required|numeric',
            'expireDate' => 'required|date',
        ];
    }

    public function createNewCoupon()
    {
        Coupon::create([
            'code' => $this->code,
            'type' => $this->type,
            'value' => $this->couponValue,
            'cart_value' => $this->cartValue,
            'exprie_date' => $this->expireDate,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.coupons.add-coupon')->layout('layouts.Admin.base');
    }


}
