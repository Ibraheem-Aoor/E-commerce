<?php
namespace App\Http\Livewire\User\Guest;


use App\Models\Product;
use App\Models\Rate;
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
    public $test  ,  $images = [];
    /* End Attributes */



    public function mount($id)
    {
        $this->product = Product::with('reviews')->findOrFail($id);
        $this->calculateProductRate();
        $this->poularProducts = Product::inRandomOrder()->limit(4)->get();
        $this->relatedProducts = Product::where([
            ['sub_category_id' , '=' , $this->product->sub_category_id ],
            [ 'id' , '!='  , $this->product->id]
        ])->inRandomOrder()->limit(5)->get();
        if($this->product->images)
        {
            $this->images = explode(',' , $this->product->images);
        }
    }

// Calculate the rate of the product (integer Value)
// and save it to product rate filed.
    public function calculateProductRate()
    {
        $count = $this->product->reviews->count('rating');
        $sum = $this->product->reviews->sum('rating');
        try
        {
            $this->product->rate = (int) ($sum/$count);
        }
        catch(Exception $e)
        {
            $this->product->rate = 1;
        }
        $this->product->save();
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

    public function render()
    {
        return view('livewire.user.guest.details')->extends('layouts.master')->section('content');
    }

}
