<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class Shop extends Component
{
// Traits
    use WithPagination;

// Attributes
    public $sortMode , $pagesize;
    public $maxPrice , $minPrice;

// livewire Constructor
    public function mount($category_id = null)
    {
        $this->sortMode = 'default';
        $this->pagesize = 12;
        $this->minPrice = 1;
        $this->maxPrice = 2500;
        // Cart::instance('cart')->store(Auth::id());
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
        $data  = Cart::instance('cart')->add($productId, $productName, 1, $ProductPrice)->associate('\App\Models\Product');
        return redirect(route('cart'));
    }


// Sort items
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

// Add To Wishlist
    public function addTowishlist($productId , $productName, $ProductPrice)
    {
        if(!Auth::check())
            return redirect(route('login'));
        Cart::instance('wishlist')->store(Auth::id());
        $datat = Cart::instance('wishlist')->add($productId,$productName,1,$ProductPrice)->associate('\App Models\Product');
    }


// Remove from wishlist
    public function removeFromWishlist($productId)
    {
        foreach(Cart::instance('wishlist')->content() as $temp)
        {
            if($temp->id == $productId)
            {
                Cart::instance('wishlist')->remove($temp->rowId);
            }
        }
    }
}
