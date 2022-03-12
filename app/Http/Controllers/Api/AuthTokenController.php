<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


    class AuthTokenController extends Controller
{
    /*
        Note: To check Abilities of a token get The current auth user
        $user->tokenCan('permession'); // True|False
    */
    public function index(Request $request)
    {
        return $request->user()->tokens;
    }

    // Generate New Token for user (Login)
    public function generateToken(ApiLoginRequest $request)
    {
        $user = User::where('email' , $request->email)->first();
        $userWithPw =  $user->makeVisible(['password']); //becuase it's hidden from the model
        if($userWithPw && Hash::check($request->password , $userWithPw->password))  //credintails checked (Auth user)
        {
            return $this->createTokenAndResponse($request , $userWithPw);
        }
        else
            return response()->json(['msg' => 'Invalid login data'] , 401);
    }

    // Generate the token and return the response
    public function createTokenAndResponse($request , $user)
    {
      $token = $user->createToken($request->device , ['*']);
      return response()->json([
          'token_data' => [
              'Note:' => 'use plain token for autoherization' ,
              'token' => $token,
          ],
          'user_data' => $user,
      ],201);
    }


 // Delete the token (logout from specified token)
    public function destroy($id)
    {
        $user = Auth::guard('sanctum')->user();
        $user->tokens()->findOrFail($id)->delete();
        return response()->json(['message' => 'Token Deleted Successfully']);
    }

    // Logout from the current device (Delete Current used Token)
    public function logout()
    {
        $user = Auth::guard('sanctum')->user();
        $token = $user->currentAccessToken();
        $token->delete();
        return response()->json(
            ['message' => 'You\'re Logged Out successfully ']

        );
    }

    // LogOut From all Devices
    public function destroyAll()
    {
        $user = Auth::guard('sanctum')->user();
        $user->tokens()->delete();
        return response()->json(
            ['message' => 'All Tokens have been deleted Successfully']
        );

    }
}
