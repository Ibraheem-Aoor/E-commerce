<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{

    public function render()
    {
        $products = Product::paginate(6);
        return view('livewire.admin.product.products'  , ['products' => $products , 'i' => 1])->extends('layouts.master')->section('content');
    }

    public function deleteProdcut($id)
    {
        $target = Product::findOrFail($id);
        $target->delete();
        session()->flash('deleted' , 'Product Deleted Successfully');

    }

}
