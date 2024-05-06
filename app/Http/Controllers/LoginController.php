<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Validator;
// use App\Http\Resources\user as UserResource;


class LoginController extends Controller
{
    use Traits\ValidatesData ;

   
    public function login(LoginRequest $request){
       

        $validatedData =$this->validateData($request);
        
        $user=User::where('email',$validatedData['email'])->first();
        //user check
        if($user) {
             //password check
            if(Hash::check($validatedData['password'],$user->password))
            {return response(['Token'=>$user->createToken('Access Token')->accessToken,
                              'User'=> $user
                              ] , 200);
                            }else{
                                return response(['password'=> 'password mismatch'],422);
                            }
                        }else{
                            return response(['message' => 'user not found'] , 422);
                        }
                    }     
}

