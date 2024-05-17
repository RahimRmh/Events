<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRequest;
use App\Http\Requests\DishTypeRequest;
use App\Models\dish;
use App\Models\hall;
use Illuminate\Http\Request;
use App\Http\Resources\dishes as DishResource;

class DishController extends Controller
{ 

       
     public function store(DishRequest $request)
      { 
                // Return a JSON response with the created dish and a success message
            return response()->json(["THE Dish"=>  dish::create($request->validated()),
             'message' => 'dishes created successfully'],200);
        }




        public function DishAccordingToHalls($hallId ,DishTypeRequest $request)
    {
        $validatedData = $request->validated();
   
        //    eager loading
    
        $hall = Hall::with(['dishes' => function ($query) use($validatedData) {
        $query->where('type', $validatedData['type'])->select('name','price','dish_image');
   
   
          }])->find($hallId);


    //without eager loading

    // $hall=hall::find($hallId);

    // $hall->dishes()->where('type','dinner')->select('name')->get();

        return response()->json([
            "Dishes" =>DishResource::collection($hall->dishes),
            'message' => 'Dishes retrieved successfully',
        ], 200);
    }
    
    
}
    