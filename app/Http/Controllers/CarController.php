<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\car;
use App\Models\hall;
use Illuminate\Http\Request;
use App\Http\Resources\Cars as CarsResource;


class CarController extends Controller
{
   

    public function index()
    {
        return response()->json([
            "THE Cars"=> CarsResource::collection( car::all()),
            "message" => 'cars returned successfully'
        
        ],200);
    }


    public function store(CarRequest $request)
    {           
        $validatedData = $request->validated() ; 
        
          $validatedData['car_image'] = $request->file('car_image')->store('cars_images', 'public') ;

        return response()->json([
            "car"=>new CarsResource(Car::create($validatedData)),
            "message" => 'car created successfully'
        ],200);
    }

  
    public function CarAccordingToHalls($hallId)
    {
        return response()->json([
            "Cars "=> new CarsResource(hall::find($hallId)->cars()->get()),
             "message" => 'Cars Returned successfully'
            ],200);
        
    }
    
}
