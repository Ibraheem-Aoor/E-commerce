<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class EditCategory extends Component
{
    public $name , $slug , $target;
    public function mount($id = null)
    {
        $this->target = Category::findOrFail($id);
        if($this->target != null)
        {
            $this->name = $this->target->name;
            $this->slug = $this->target->slug;
        }
    }

    public function render()
    {
        $this->slug = Str::slug('category - '.$this->name);
        return view('livewire.admin.category.edit-category')->extends('layouts.master')->section('content');
    }

    public function editExistedCategory()
    {
        $this->validate(
            ['name'=>'required'] ,
            ['name.required'=>"Category Name is required"]
        );
        $this->target->name = $this->name;
        $this->target->slug = $this->slug;
        $this->target->save();
        session()->flash('edited' , 'Edited Successfully');
    }
}

