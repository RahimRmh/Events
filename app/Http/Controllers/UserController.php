<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return response(['user'=> User::all()])
        ->setStatusCode(200,'Users returned successfully');
    }

}