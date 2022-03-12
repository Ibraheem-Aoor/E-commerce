<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfile extends Component
{
    public function render()
    {
        $user = User::with('profile')->findOrFail(Auth::id());
        return view('livewire.user.auth.user-profile' , ['user' => $user])->extends('layouts.master')->section('content');
    }
}
