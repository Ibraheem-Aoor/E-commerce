<?php

namespace App\Http\Livewire\Admin\UserManagment\contacts;

use App\Models\Contact;
use Livewire\Component;

class ContactDetails extends Component
{

    // Attributes
    public $contact;

    public function mount($id = null)
    {
        $this->contact = Contact::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.user-management.contacts.contact-details')->layout('layouts.Admin.Base');;
    }
}
