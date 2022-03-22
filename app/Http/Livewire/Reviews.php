<?php

namespace App\Http\Livewire;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Rates;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reviews extends Component
{
    // Attributes
    public $orderItem , $rating , $email , $comment;

    public function mount($id = null)
    {
        $this->orderItem = OrderItem::findOrFail($id);
    }



// Validate and create The Review.
    public function addReview()
    {
        $this->validate($this->rules());
        Review::create([
            'rating' => (int)$this->rating,
            'order_item_id' => $this->orderItem->id,
            'Author' => Auth::user()->name,
            'comment' => $this->comment,
        ]);
        session()->flash('success' , 'Thanks For Reviewing!');
    }

    public function rules()
    {
        return
        [
            'rating' =>'required|numeric',
            'email' =>'nullable|email',
            'comment' =>'required|string',
        ];
    }

    public function render()
    {
        return view('livewire.user.auth.reviews')->extends('layouts.master')->section('content');
    }
}
