<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $x = "Hema";
    public function render()
    {
        return view('livewire.home')->extends('layouts.master')->section('content');
    }
}
