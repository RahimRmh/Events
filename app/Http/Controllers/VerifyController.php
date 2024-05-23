<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerficationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function verify(VerficationRequest $request)
    {
        // Find the user by email and verification code
        // If no matching user is found, it will throw a ModelNotFoundException
        $user = User::where('email', $request->email)
                    ->where('verification_code', $request->verification_code)
                    ->firstOrFail();
    
        // Mark the user as verified
        $user->verified = true;
        
        $user->verification_code = null;
    
        // Save the changes to the user record
        $user->save();
    
        // Return a JSON response indicating successful verification
        return response()->json(['message' => 'Verification successful'], 200);
    }
    }
