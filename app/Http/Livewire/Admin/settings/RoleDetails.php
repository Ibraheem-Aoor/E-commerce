<?php

namespace App\Http\Livewire\Admin\settings;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleDetails extends Component
{
    public $role , $name , $selectedPermissions;

    public function mount($id)
    {
        $this->role  = Role::findOrFail($id);
        $this->name = $this->role->name;
        $this->selectedPermissions =  $this->role->getAllPermissions();
    }

    public function saveRole()
    {
        $this->validate($this->rules());
        $this->role->syncPermissions($this->selectedPermissions);
        $this->role->name = $this->name;
        $this->role->save();
        session()->flash('success' , 'Role Updated Successfully');
    }

    public function rules()
    {
        return
        [
            'name' => 'unique:roles,name,'.$this->role->id.'|string|max:200',
            'selectedPermissions' => 'nullable|array',
        ];
    }

    public function render()
    {
        $allPermissions = Permission::all();
        return view('livewire.admin.settings.role-details' , ['allPermissions' => $allPermissions])->layout('layouts.Admin.base');
    }
}
