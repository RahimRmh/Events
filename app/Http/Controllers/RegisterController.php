<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreuserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Jobs\SendVerificationCodeMail;


class RegisterController extends Controller
{

    public function register(StoreuserRequest $request)
    {
        // Validate incoming request data
        $validatedData = $request->validated();

       // Hash the password before saving it to the database for security
        $validatedData['password'] = Hash::make($validatedData['password']);

        $validatedData['verification_code'] =  mt_rand(100000, 999999) ;


        // Create a new user in the database
        $user = User::create($validatedData);

      //job 
        SendVerificationCodeMail::dispatch($user);
    
        // Create an access token for the user
        $accessToken = $user->createToken('Access Token')->accessToken;
        // Return a JSON response with the user data and access token
        return response()->json([
            'user' => $user->only(['id', 'name', 'email', 'phone_number']), 
            'token' => $accessToken,
            'message' => 'User registered successfully' // Add a message to indicate successful registration
        ], 200);
    }
    
}
