<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category as CategoreyModel;
class Category extends Component
{

    use WithPagination;
    /* Start Attributes */
    public $sortMode , $pagesize;
    private $categoryId;
    /* Start Attributs */

    public function mount($id = null)
    {
        $this->sortMode = 'default';
        $this->pagesize = 12;
        $this->categoryId = $id;
    }

    public function render()
    {
        $categories = CategoreyModel::all();
        $products = $this->sortItems();
        return view('livewire.shop' , ['products' => $products , 'categories' => $categories])->extends('layouts.master')->section('content');
    }



    public  function sortItems()
    {
        switch($this->sortMode)
        {
            case 'date': return Product::where('category_id' , $this->categoryId)->orderBy('created_at' , 'DESC')->paginate($this->pagesize); break;
            case 'price': return Product::where('category_id' , $this->categoryId)->orderBy('sale_price' , 'asc')->paginate($this->pagesize); break;
            case 'price-desc': return Product::where('category_id' , $this->categoryId)->orderBy('sale_price' , 'desc')->paginate($this->pagesize); break;
            default: return Product::where('category_id' , $this->categoryId)->paginate($this->pagesize);
        }
    }
}
