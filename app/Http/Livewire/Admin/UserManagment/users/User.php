<?php

namespace App\Http\Livewire\Admin\UserManagment\users;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;
class User extends Component
{
    public $currentUserId , $currentUserName;

    use WithPagination;


// Deleting a user
    public function deleteUser($id)
    {
        $targetUser = ModelsUser::findOrFail($id);
        $targetUser->delete();
        session()->flash('deleted' , 'User Deleted Successfully1');
    }

    public function render()
    {
        $users = ModelsUser::paginate(10);
        return view('livewire.admin.user-management.users-table' , ['users' => $users] )->layout('layouts.Admin.base');
    }


}
