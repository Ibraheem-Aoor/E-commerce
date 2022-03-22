<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
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
        return view('livewire.admin-nav');
    }
}
