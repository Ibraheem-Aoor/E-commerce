<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Rates;
use App\Models\Review;
use Livewire\Component;

class Reviews extends Component
{
    public $rate , $reviewText , $product , $numOfReviews;

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
    }

    public function render()
    {
        $newRate = new Rate();
        $newRate->product_id = $this->product->id;
        $newRate->stars = $this->rate ?? 1;
        $newRate->save();
        $allReviews =  Review::where([['product_id' , $this->product->id]])->orderBy('created_at' , 'desc')->limit(7)->get();
        $this->numOfReviews = $allReviews->count();
        return view('livewire.reviews' , ['allRev' => $allReviews]);
    }

// Adding a new review for the current product.
    public function addReview()
    {
        $newRev = new Review();
        $newRev->content = $this->reviewText;
        $newRev->product_id = $this->product->id;
        $newRev->save();
        $this->reviewText = '';
        session()->flash('reviewAdded' , 'Thanks for reviewing!');

    }
}
