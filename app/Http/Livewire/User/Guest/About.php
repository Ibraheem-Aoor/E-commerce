<?php

namespace App\Http\Livewire\User\Guest;


use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.user.guest.about')->extends('layouts.master')->section('content');
    }
}
