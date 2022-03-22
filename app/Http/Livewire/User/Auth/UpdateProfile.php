<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfile extends Component
{

    use WithFileUploads;

    // Attributes
    public  $city , $country , $mobile , $address , $newImage;

// Update User profile data.
    public function updateProfile()
    {
        $this->validate($this->rules());
        $profile = Profile::where('user_id' , Auth::id())->first();
        if(!$profile)
            $profile = $this->createProfile();
        $profile->user_id = Auth::id();
        $profile->mobile = $this->mobile;
        $profile->city = $this->city;
        $profile->country = $this->country;
        $profile->address = $this->address;
        if($this->newImage)
        {
            $this->saveImage();
            // return dd('saved');
        }
        $profile->save();
        session()->flash('success' , 'Profile Updated Successfully');
    }

//  profile data validation ruels
    public function rules()
    {
        return [
            'city' => 'required|string|max:200' ,
            'address' => 'required|string|max:200' ,
            'country' => 'required|string|max:200' ,
            'mobile' => 'required|numeric|' ,
            'newImage' => 'nullable|image|mimes:jpg,jpeg,png|max:1024' ,
        ];
    }

// Create A new Profile model and return it.
    public function createProfile()
    {
        $profile = new Profile();
        return $profile;
    }


// Save The image
    public function saveImage()
    {
        $imageName = time().'.'.$this->newImage->getClientOriginalExtension();
        $path = Storage::disk('uploads')->putFileAs('users/'.Auth::id() , $this->newImage , $imageName);
        $user = User::findOrFail(Auth::id());
        $user->profile_photo_path = $imageName;
        $user->save();
    }


    public function render()
    {
        $user = User::with('profile')->findOrFail(Auth::id());
        return view('livewire.user.auth.update-profile' , ['user' => $user])->extends('layouts.master')->section('content');
    }



}
