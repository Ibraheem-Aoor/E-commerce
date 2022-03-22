<?php

namespace App\Http\Livewire\Admin\settings;

use App\Models\Setting;
use Livewire\Component;


class Settings extends Component
{
    // Attriubutes
    public $email , $mobile , $address , $mailOffice;
    public $fb , $twitter , $linkedIn , $youtube;

    public function saveSettings()
    {
        $this->validate($this->rules());
        Setting::create([
            'email' => $this->email,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'mail_office' => $this->mailOffice,
            'fb' => $this->fb,
            'twitter' => $this->twitter,
            'linkedIn' => $this->linkedIn,
            'youtube' => $this->youtube,
        ]);
        session()->flash('success' , 'Settings saved Successfully');
    }

    public function rules()
    {
        return [
            'email' => 'nullable|email|string|max:255',
            'mobile' => 'nullable|numeric|',
            'address' => 'nullable|string|max:255',
            'mailOffice' => 'nullable|string|max:255',
            'fb' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedIn' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
        ];
    }

    public function render()
    {
        return view('livewire.admin.settings.settings')->layout('layouts.Admin.Base');
    }
}
