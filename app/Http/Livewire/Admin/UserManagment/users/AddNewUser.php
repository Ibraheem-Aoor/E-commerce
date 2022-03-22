<?php

namespace App\Http\Livewire\Admin\UserManagment\users;

use App\Models\User;
use Livewire\Component;

class AddNewUser extends Component
{
    //Attributes
    public
        $name , $email,
        $password , $password_confirmation;

    public function addNewUser()
    {
        $this->validate($this->rules());
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        $this->clearAttributes();
        session()->flash('success' , 'User Added Successfully');
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:users|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
        ];
    }

// Set All Attributes to null after successfully adding a new user.
    public function clearAttributes()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        return view('livewire\admin\user-management\add-new-user')->layout('layouts.Admin.base');
    }
}
