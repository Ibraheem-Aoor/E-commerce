<?php

namespace App\Http\Livewire\Admin\settings;


use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddNewRole extends Component
{
    public $name , $selectedPermissions;
    public function addRole()
    {
        $this->validate($this->rules());
        $role = new Role();
        $role->name = $this->name;
        $role->syncPermissions($this->selectedPermissions);
        $role->save();
        session()->flash('success' , 'Role Created Successfully');
    }
    public function rules()
    {
        return
        [
            'name' => 'required|unique:roles,name|string|max:200',
            'selectedPermissions' => 'nullable|array',
        ];
    }
    public function render()
    {
        $allPermissions = Permission::all();
        return view('livewire.admin.settings.add-new-role' , ['allPermissions' => $allPermissions])->layout('layouts.Admin.base');
    }
}
