<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class AddCategory extends Component
{
    public $name , $slug;

    public function render()
    {
        // $this->slug = Str::slug('category - '.$this->name);
        return view('livewire.admin.category.add-category')->layout('layouts.Admin.base');
    }



    public function addNewCategory()
    {
        $this->validate(
            ['name'=>'required|max:255' ,
            'slug' => 'max:255'] ,
            ['name.required'=>"Category Name is required" ]
        );
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug.'-'.Auth::id().random_int(1,1000000000);
        $category->save();
        session()->flash('success' , 'Category Created Successfully');
        $this->name = '';
        $this->slug = '';
    }


}
