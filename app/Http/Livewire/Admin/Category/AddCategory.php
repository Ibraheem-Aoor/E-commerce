<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AddCategory extends Component
{
    public $name , $slug;

    public function render()
    {
        $this->slug = Str::slug('category - '.$this->name);
        return view('livewire.admin.category.add-category')->extends('layouts.master')->section('content');
    }



    public function addNewCategory()
    {
        $this->validate(
            ['name'=>'required'] ,
            ['name.required'=>"Category Name is required"]
        );
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug.'-'.rand(1,100000);
        $category->save();
        session()->flash('success' , 'Category Created Successfully');
        $this->name = '';
    }


}
