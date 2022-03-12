<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {

        return view('livewire.user.dashboard')->layout('layouts.master');
    }
}
