<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Rates;
use App\Models\Review;
use Exception;
use Livewire\Component;
use Gloudemans\Shoppingcart\CartItem;
// use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\CartItemOptions;
use Gloudemans\Shoppingcart\Facades\Cart;

use function PHPUnit\Framework\isEmpty;

// use Gloudemans\Shoppingcart\Cart;

class Details extends Component
{

    /* Start Attributes */
    public $product , $relatedProducts , $poularProducts ;
    public $test , $rate  , $numOfReviews;
    /* End Attributes */


    //Constructo
    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
        $this->poularProducts = Product::where('rate' , '5')->limit(4)->get();
        $this->relatedProducts = Product::where([
            ['category_id' , '=' , $this->product->category_id ],
            [ 'id' , '!='  , $this->product->id]
        ])->inRandomOrder()->limit(5)->get();
        $this->numOfReviews = Review::where('product_id' , $this->product->id)->count();
        $this->setProductRate($id);
    }

    public function render()
    {
        return view('livewire.details')->extends('layouts.master')->section('content');
    }

// Store new Item to the cart
    public  function storeItem($productId , $productName, $ProductPrice)
    {
        if(!Auth::check())
            return redirect(route('login'));
        Cart::instance('cart')->add($productId, $productName, 1, $ProductPrice)->associate(Product::class); //default Quntiaty is 1;
        session()->flash('ProductAddedToCart' , 'Product Added Successfully');
        return redirect(route('cart'));
    }

// Calculate the product rate
    public function setProductRate($id)
    {
        $allRates = Rates::where('product_id', $id)->get();
        $ratesCount  = $allRates->count(); //total
        $votesFor5 = $allRates->where('stars' , 5)->count();
        $votesFor4 = $allRates->where('stars' , 4)->count();
        $votesFor3 = $allRates->where('stars' , 3)->count();
        $votesFor2 = $allRates->where('stars' , 2)->count();
        $votesFor1 = $allRates->where('stars' , 1)->count();
        try
        {
            $result = (5*$votesFor5 + 4*$votesFor4 + 3*$votesFor3 + 2*$votesFor2 + 1*$votesFor1) / $ratesCount;
            $this->rate = (int)$result;
            $this->product->rate = $this->rate;
            $this->product->save();
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
}
