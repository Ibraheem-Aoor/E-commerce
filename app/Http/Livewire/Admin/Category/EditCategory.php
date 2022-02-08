<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class EditCategory extends Component
{
    public $name , $slug , $target;

    public function mount($id = null)
    {
        // binding the attributes with the form inputs
        $this->target = Category::findOrFail($id);
        if($this->target != null)
        {
            $this->name = $this->target->name;
            $this->slug = $this->target->slug;
        }
    }

    public function render()
    {
        // $this->slug = Str::slug('category - '.$this->name);
        return view('livewire.admin.category.edit-category')->layout('layouts.Admin.base');
    }

// Editing the target Category
    public function editCategory()
    {
        $this->validate(
            ['name'=>'required|max:255' ,
            'slug' => 'max:255'] ,
            ['name.required'=>"Category Name is required" ]
        );
            $this->target->name = $this->name;
            $this->target->slug = $this->slug.'-'.Auth::id().random_int(1,1000000000);
            $this->target->save();
        session()->flash('edited' , 'Category Edited Successfully');
    }
}

