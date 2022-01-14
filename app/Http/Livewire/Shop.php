<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Collection;

class Shop extends Component
{
    use WithPagination;
    /* Start Attributes */
    public $sortMode , $pagesize;
    /* Start Attributes */

    public function mount($category_id = null)
    {
        $this->sortMode = 'default';
        $this->pagesize = 12;
    }

    public function render()
    {
        $products = $this->sortItems();
        $categories = Category::all();
        return view('livewire.shop' , ['products' => $products , 'categories' => $categories])->extends('layouts.master')->section('content');
    }


    // Store item to user's ShoppingCart
    public  function storeItem($productId , $productName, $ProductPrice)
    {
        if(!Auth::check())
            return redirect(route('login'));
        Cart::add($productId, $productName, 1, $ProductPrice)->associate(Product::class); //default Quntiaty is 1;
        session()->flash('ProductAddedToCart' , 'Product Added Successfully');
        return redirect(route('cart'));
    }

    public  function sortItems()
    {
        switch($this->sortMode)
        {
            case 'date': return Product::orderBy('created_at' , 'DESC')->paginate($this->pagesize); break;
            case 'price': return Product::orderBy('sale_price' , 'asc')->paginate($this->pagesize); break;
            case 'price-desc': return Product::orderBy('sale_price' , 'desc')->paginate($this->pagesize); break;
            default: return Product::paginate($this->pagesize);
        }
    }
}
