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
class RegisterController extends Controller
{

    public function register(StoreuserRequest $request)
    {
        // Validate incoming request data
        $validatedData = $request->validated();
    
        // Create a new user in the database
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone_number' => $validatedData['phone_number']
        ]);
    
        // Create an access token for the user
        $accessToken = $user->createToken('Access Token')->accessToken;
    
        // Return a JSON response with the user data and access token
        return response()->json([
            'user' => $user,
            'access_token' => $accessToken,
            'message' => 'User registered successfully' // Add a message to indicate successful registration
        ], 200);
    }
    
}
