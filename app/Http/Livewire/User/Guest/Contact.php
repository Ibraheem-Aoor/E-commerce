<?php

namespace App\Http\Livewire\User\Guest;



use App\Models\Contact as ModelsContact;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Contact extends Component
{
    // Attributes
    public $name , $email , $phone  , $comment;

    public function submitContactForm()
    {
        $this->validate($this->rules());
        $this->saveContactFormData();
        session()->flash('success' , 'WE WILL REACH U VERY SOON!');
    }

    public function rules()
    {
        return
        [
            'name' => 'required|string|max:200' ,
            'email' => 'required|email' ,
            'phone' => 'numeric|nullable',
            'comment' => 'nullable|string|max:500',
        ];
    }

    public function saveContactFormData()
    {
        ModelsContact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'comment' => $this->comment,
            'user_id' => Auth::check() ? Auth::id() : null,
        ]);
    }

    public function render()
    {
        return view('livewire.user.guest.contact')->extends('layouts.master')->section('content');
    }
}
