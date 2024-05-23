<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingerRequest;
use App\Models\hall;
use App\Models\Singer;
use Illuminate\Http\Request;
use App\Http\Resources\Singer as singerResource;


class SingerController extends Controller
{
  
       
     public function store(SingerRequest $request)
      { 
                // Return a JSON response with the created singer and a success message
            return response()->json(["THE singer"=>  Singer::create($request->validated()),
             'message' => 'singer created successfully'],200);
     }


        public function SingerAccordingToHalls($hallId)
    {
            // Find the hall by its ID and eager load the singers with specific columns
             $hall = Hall::with(['singers:id,name,price'])->findOrFail($hallId);

            // Prepare the response with the singers and a success message
              return response()->json(['singers' =>singerResource::collection($hall->singers ) ,
                                      'message' => 'singers returned successfully' 
                                      ],200) ;
      
    }
}
