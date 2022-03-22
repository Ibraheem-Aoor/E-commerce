<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\HomePageCategory as HomePageCategoryModel;
use Livewire\Component;

class HomePageCategory extends Component
{
// Attributes
    public $selectedCategories = array();
    public $numOfProducts;

    public function setSelectedCategories()
    {
        $this->validate(['numOfProducts'=> 'required|numeric' , 'selectedCategories'=>'required']);
        if($this->selectedCategories != null && $this->numOfProducts != 0)
            $this->addSelectedCategoriesToDB();
        session()->flash('success' , 'categories added to home page successfully');
    }

    public function addSelectedCategoriesToDB()
    {
        foreach($this->selectedCategories as $categoryId)
        {
            if(HomePageCategoryModel::where('category_id' , $categoryId)->first() != null) //Exists!
                continue;
            HomePageCategoryModel::create([
                'category_id' => $categoryId ,
                'number_of_products' => $this->numOfProducts ,
            ]);
        }
    }
    // Make Custom Messages here


    public function render()
    {
        return view('livewire.admin.category.home-page-category' , ['categories' =>Category::all()])->layout('layouts.Admin.base');
    }
}
