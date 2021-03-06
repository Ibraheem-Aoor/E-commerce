<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $chartData=[] , $latestUsers;
    public function mount()
    {
        $this->chartData = User::selectRaw('COUNT(*) as count, MONTH(id) month')
        ->groupBy('month')
        ->get();
        $this->latestUsers = User::latest()->take(6)->get();
    }


    public function render()
    {
        $numberOfOrders = Order::count();
        $numberOfUsers = User::count();
        $numberOfProducts = Product::count();
        $numberOfCategories = Category::count();
        return view('livewire.admin.dashboard' ,
        [
            'numberOfOrders' => $numberOfOrders,
            'numberOfUsers' => $numberOfUsers,
            'numberOfProducts' => $numberOfProducts,
            'numberOfCategories' => $numberOfCategories,
        ])->layout('layouts.Admin.base');
    }
}
