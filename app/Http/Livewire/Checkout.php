<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Checkout extends Component
{

    public function mount($id = null)
    {
        // redirect if user isn't authenticated
        if(!Auth::check())
            return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.checkout')->extends('layouts.master')->section('content');
    }
}
