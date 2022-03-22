<?php

namespace App\Http\Livewire\Admin\UserManagment\contacts;

use App\Models\Contact;
use Livewire\Component;

class Contacts extends Component
{


    public function render()
    {
        $contacts = Contact::paginate(7);
        return view('livewire.admin.user-management.contacts.contacts' , ['contacts' => $contacts])->layout('layouts.Admin.Base');
    }
}
