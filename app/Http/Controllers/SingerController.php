<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingerRequest;
use App\Models\hall;
use App\Models\Singer;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    public function index()
       {    // Return a JSON response containing the singers and a success message
        return response()->json(["singers"=> Singer::all(),
         'message' => 'singers returned successfully'],200); 
       }
       
     public function store(SingerRequest $request)
      { 
                // Return a JSON response with the created singer and a success message
            return response()->json(["THE singer"=>  Singer::create($request->validated()),
             'message' => 'singer created successfully'],200);
        }


        public function SingerAccordingToHalls($hallId)
    {
        // Retrieve dinner singers for the specified hall
        $singers = Hall::find($hallId)->singers()->get();
    
        return response()->json([
            "singers" => $singers,
            'message' => 'singers retrieved successfully',
        ], 200);
    }
}
