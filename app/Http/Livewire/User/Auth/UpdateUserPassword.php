<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateUserPassword extends Component
{
    // Attributes
    public $currentPassword  , $password , $password_confirmation;

    public function updatePassword()
    {
        $this->validate($this->rules());
        if(Hash::check($this->currentPassword , Auth::user()->password))
        {
            $this->changePassword();
            $this->emptyInputs();
        }
        else
            session()->flash('error' , 'password doesn\'t match');
    }
    public function rules()
    {
        return [
            'password' => 'required|confirmed|string|different:currentPassword',
            'password_confirmation' => 'required|string',
            'currentPassword' => 'required|current_password|string',
        ];
    }

    public function changePassword()
    {
        $user = User::findOrFail(Auth::id());
        $user->password = Hash::make($this->password);
        $user->save();
        session()->flash('success' , 'password updated successfully');
    }

    public function emptyInputs()
    {
        $this->currentPassword = '';
        $this->password = '';
        $this->password_confirmation = '';
    }


    public function render()
    {
        return view('livewire.user.auth.update-user-password')->extends('layouts.master')->section('content');
    }
}
