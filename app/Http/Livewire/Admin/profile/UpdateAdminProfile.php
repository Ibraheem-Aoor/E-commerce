<?php

namespace App\Http\Livewire\Admin\profile;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateAdminProfile extends Component
{
    use WithFileUploads;
    // Attributes
    public $name , $email  , $mobile ,
            $country , $city , $newImage;
    public $admin;

    public function mount($id = null)
    {
        $this->admin = User::with('profile')->findOrFail(Auth::id());
        $this->name = $this->admin->name;
        $this->email = $this->admin->email;
        // if there is a profile record before we will retive the old data to show it On Update Page.
        if($this->admin->prfoile)
            $this->setOldDataOnUpdateForm();
    }

    public function setOldDataOnUpdateForm()
    {
            $this->mobile = $this->admin->proile->mobile;
            $this->city = $this->admin->proile->city;
            $this->country = $this->admin->proile->country;
    }

// Save the profile (form).
    public function saveProfile()
    {
        $this->validate($this->rules());
        $this->admin->name = $this->name;
        $this->admin->email = $this->email;
        $this->admin->save(); //users table
        $profile = Profile::where('user_id' , Auth::id())->first();
        if(!$profile)
            $this->createProfileAndSetData(); //profile table.
        if($this->newImage)
            $this->saveImage();
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
            'newImage' => 'nullable|image|mimes:jpg,jpeg,png|max:1024' ,
        ];
    }

// Create a new profile record for the user and add the submited form data to it.
    public function createProfileAndSetData()
    {
        $profile = new Profile();
        $profile->user_id = Auth::id();
        $profile->mobile = $this->mobile;
        $profile->city = $this->city;
        $profile->country = $this->country;
        $profile->address = $this->country . ',' . $this->city;
        $profile->save();
    }

// save the new image to DB and save it's path to user table
    public function saveImage()
    {
        $imageName = time().'.'.$this->newImage->getClientOriginalExtension();
        $path = Storage::disk('uploads')->putFileAs('admins/'.Auth::id() , $this->newImage , $imageName);
        $user = User::findOrFail(Auth::id());
        $user->profile_photo_path = $imageName;
        $user->save();
    }

    public function render()
    {
        return view('livewire.admin.profile.update-admin-profile' )->layout('layouts.Admin.base');
    }
}
