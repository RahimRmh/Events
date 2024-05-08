<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRequest;
use App\Models\dish;
use App\Models\hall;
use Illuminate\Http\Request;

class DishController extends Controller
{ 
  
    public function index()
       {    // Return a JSON response containing the dishes and a success message
        return response()->json(["dishes"=> dish::all(),
         'message' => 'dishes returned successfully'],200); 
       }
       
     public function store(DishRequest $request)
      { 
                // Return a JSON response with the created dish and a success message
            return response()->json(["THE Dish"=>  dish::create($request->validated()),
             'message' => 'dishes created successfully'],200);
        }




        public function DishAccordingToHalls($hallId)
    {
        // Retrieve dinner dishes for the specified hall
        $dishes = hall::find($hallId)->dishes()->where('type', 'dinner')->get();
    
        return response()->json([
            "Dishes" => $dishes,
            'message' => 'Dishes retrieved successfully',
        ], 200);
    }
    
    
}
    