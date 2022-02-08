<?php

namespace App\Http\Livewire\User\Auth;

use Livewire\Component;

class ThankYou extends Component
{
    public function render()
    {
        return view('livewire.user.auth.thank-you')->extends('layouts.master')->section('content');
    }
}
