<?php

namespace App\Http\Livewire\Admin\Layout\Navbars;

use App\Notifications\NewUser;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Livewire\Component;

class AdminNav extends Component
{

    protected $listeners = ['newUserNotification' => '$refresh'];

    public function markAsRead($notification)
    {
        $data = Auth::user()->unReadNotifications->where('id' ,$notification['id'])->first();
        $data->update(['read_at' => now()]);
        $data->save();
    }

    public function render()
    {
        return view('layouts.Admin.navbars.auth.admin-nav');
    }
}
