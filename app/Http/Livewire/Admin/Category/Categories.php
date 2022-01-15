<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        $categories = Category::latest('created_at')->paginate(6);
        return view('livewire.admin.category.categories' , ['categories' => $categories  ,'i'=>1])->extends('layouts.master')->section('content');
    }

    public function deleteCategory($id)
    {
        $target = Category::findOrFail($id);
        $target->delete();
        session()->flash('deleted' , 'Category Deleted Successfully');
    }

    public function edit($id)
    {
        return redirect(route('admin.categories.edit' , $id));
    }
}
