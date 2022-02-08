<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;
use App\Models\HomePageCategory;
use App\Models\Sale;
use Exception;

class Home extends Component
{

    public $latestProducts , $onsaleProducts , $saleObject;

    public function mount($id = null)
    {
        $this->latestProducts = Product::latest('created_at')->take(200)->get();
        $this->onsaleProducts = Product::where('sale_price'  , '>', 0)->limit(200)->get();
        $this->saleObject = Sale::findOrFail(1);
    }

    public function render()
    {
        return view('livewire.home')->extends('layouts.master')->section('content');
    }
}
