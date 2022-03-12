<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminNav extends Component
{

    protected $listeners = ['refreshProducts' => '$refresh'];
    public function render()
    {
        return view('livewire.admin-nav');
    }
}
