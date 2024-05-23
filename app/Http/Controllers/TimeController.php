<?php

namespace App\Http\Controllers;

use App\Models\time;
use Illuminate\Http\Request;
use App\Http\Resources\time as timeResource;


class TimeController extends Controller
{
    public function HallTime(){
        return response()->json([ timeResource::collection( time::all())],200)
        ;
    }
}
