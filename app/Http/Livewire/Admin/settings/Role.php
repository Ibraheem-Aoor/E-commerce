<?php

namespace App\Http\Livewire\Admin\settings;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    public function deleteRole($roleId)
    {
        ModelsRole::findOrFail($roleId)->delete();
        session()->flash('success' , 'Role Deleted successfully');
    }
    public function render()
    {
        $roles = ModelsRole::with('users')->lazy(); //eager loading
        return view('livewire.admin.settings.roles' , ['roles' => $roles])->layout('layouts.Admin.base');
    }
}

