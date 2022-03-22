<?php

namespace App\Http\Controllers\Api;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewUserRequest;
use App\Http\Requests\UpdateUserData;
use App\Models\User;
use App\Traits\GeneralApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    use GeneralApiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->returnData('All Admins: ' , User::where('is_admin' , 1)->get() , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewUserRequest $request)
    {
        $hashedPw = Hash::make($request->password);
        $user = User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => $hashedPw,
        ]);
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->returnData('Profile'  , User::where('id' , $id)->first() , 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserData $request, $id)
    {
        $user = User::findOrFail($id);
        $hashedPw = Hash::make($request->password);
        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email  ?? $user->email,
            'password' => $hashedPw ?? $user->password,
        ]);
        return $this->returnSuccessMessage('Profile Update Successfully' , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
