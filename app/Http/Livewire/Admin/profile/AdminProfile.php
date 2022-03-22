<?php

namespace App\Http\Livewire\Admin\profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class AdminProfile extends Component
{


    public function render()
    {
        $admin  = User::with('profile')->findOrFail(Auth::id());
        return view('livewire.admin.profile.admin-profile' , ['admin' => $admin])->layout('layouts.Admin.base');
    }


}
