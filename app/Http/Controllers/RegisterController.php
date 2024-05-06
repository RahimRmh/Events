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
    use Traits\ValidatesData;

    public function register(StoreuserRequest $request)
    {
    
       $validatedData = $this->validateData($request);
    

        $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'phone_number' => $validatedData['phone_number']
       ]);
        
        $accessToken = $user->createToken('Access Token')->accessToken;
        
        return response()->json([
            'user' => $user,
            'access_token' => $accessToken
        ]);
    }
    
}
