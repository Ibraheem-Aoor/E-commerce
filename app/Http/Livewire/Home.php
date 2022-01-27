<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;
class Home extends Component
{

    // on sale expiring date
    public $y = 2022;
    public $d = 31;
    public $m = 10;
    public $latestProducts , $onsaleProducts;

    public function mount($id = null)
    {
        $this->latestProducts = Product::latest('created_at')->take(200)->get();
        $this->onsaleProducts = Product::where('onsale' , true)->limit(200)->get();
    }

    public function render()
    {

        // Cart::instance('cart')->restore(Auth::id());
        return view('livewire.home')->extends('layouts.master')->section('content');
    }
}
