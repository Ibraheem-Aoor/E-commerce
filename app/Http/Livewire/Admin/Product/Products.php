<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product as ModelProduct;
use Livewire\Component;

class Products extends Component
{

    public function render()
    {
        $products = ModelProduct::paginate(10);
        return view('livewire.admin.product.products'  , ['products' => $products , 'i' => 1])->layout('layouts.Admin.base');
    }

// Delete a product
    public function deleteProdcut($id)
    {
        $target = ModelProduct::findOrFail($id);
        $target->delete();
        session()->flash('deleted' , 'Product Deleted Successfully');
    }

// Redirct to edit product page
    public function editProduct($id)
    {
        return redirect(route('admin.products.edit' , $id));
    }
}
