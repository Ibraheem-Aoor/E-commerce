<?php

namespace App\Http\Livewire\Admin\profile;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateAdminProfile extends Component
{
    // Attributes
    public $name , $email  , $mobile , $country , $city , $newImage;
    public $admin;

    public function mount($id = null)
    {
        $this->admin = User::with('profile')->findOrFail(Auth::id());
        $this->name = $this->admin->name;
        $this->email = $this->admin->email;
        if($this->admin->prfoile)
        {
            $this->mobile = $this->admin->proile->mobile;
            $this->city = $this->admin->proile->city;
            $this->country = $this->admin->proile->country;
        }
    }

    public function saveProfile()
    {
        $this->validate($this->rules());
        $this->admin->name = $this->name;
        $this->admin->email = $this->email;
        $this->admin->save();
        $profile = Profile::where('user_id' , Auth::id())->first();
        if(!$profile)
        {
            $profile = new Profile();
            $profile->user_id = Auth::id();
        }
        $profile->mobile = $this->mobile;
        $profile->city = $this->city;
        $profile->country = $this->country;
        $profile->address = $this->country . ',' . $this->city;
        $profile->save();
        session()->flash('success' , 'profile updated successfully');
    }

    //  profile data validation ruels
    public function rules()
    {
        return [
            'name' => 'required|string|max:200' ,
            'email' => 'required|email|string|max:200' ,
            'city' => 'required|string|max:200' ,
            'country' => 'required|string|max:200' ,
            'mobile' => 'required|numeric|' ,
            'newImage' => 'nullable|image' ,
        ];
    }

    public function render()
    {
        return view('livewire.admin.profile.update-admin-profile' )->layout('layouts.Admin.base');
    }
}
