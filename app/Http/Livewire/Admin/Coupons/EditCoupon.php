<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class EditCoupon extends Component
{
    public $code , $value , $type , $cartValue , $expDate;
    public $couponTargeted;

    public function mount($id)
    {
        $this->couponTargeted = Coupon::findOrFail($id);
        $this->code = $this->couponTargeted->code;
        $this->type = $this->couponTargeted->type;
        $this->cartValue = $this->couponTargeted->cart_value;
        $this->expDate = $this->couponTargeted->expire_date;
        $this->value = $this->couponTargeted->value;
    }
    public function render()
    {
        return view('livewire.admin.coupons.edit-coupon')->layout('layouts.Admin.base');
    }

    public function editCoupon()
    {
        $this->validate($this->rules());
        $this->couponTargeted->code = $this->code;
        $this->couponTargeted->cart_value = $this->cartValue;
        $this->couponTargeted->expire_date = $this->expDate;
        $this->couponTargeted->value = $this->value;
        $this->couponTargeted->type = $this->type;
        session()->flash('success' , 'Coupon Edit Successfully');
    }

    public function rules()
    {
        return [
            'code' => 'required|string|max:40',
            'type' => 'required',
            'value' => 'required|numeric',
            'cartValue' => 'required|numeric',
            'expDate' => 'required|date',
        ];
    }
}
