<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category as CategoryModel;
use Livewire\Component;

class CategoryComponent extends Component
{
    public function render()
    {
        $categories = CategoryModel::latest('created_at')->paginate(6);
        return view('livewire.admin.category.categories' , ['categories' => $categories  ,'i'=>1])->layout('layouts.Admin.base');
    }
//  Delete a categoty form Db
    public function deleteCategory($id)
    {
        $target = CategoryModel::findOrFail($id);
        $target->delete();
        session()->flash('deleted' , 'Category Deleted Successfully');
    }
//  Edit a specific category
    public function editCategory($id)
    {
        return redirect(route('admin.categories.edit' , $id));
    }
}
