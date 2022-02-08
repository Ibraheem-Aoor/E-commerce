<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon as ModelsCoupon;
use Livewire\Component;

class Coupon extends Component
{
    public function render()
    {
        $coupons = ModelsCoupon::all();
        return view('livewire.admin.coupons.coupon' , ['coupons'=>$coupons])->layout('layouts.Admin.base');
    }

    public function deleteCoupon($id)
    {
        $coupon = ModelsCoupon::findOrFail($id);
        $coupon->delete();
        session()->flash('deleted' , 'coupon deleted Succeesfully');
    }

    public function editCoupon($id)
    {
        return redirect(route('admin.coupons.edit', $id));
    }
}
