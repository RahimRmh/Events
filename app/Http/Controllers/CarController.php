<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\car;
use App\Models\hall;
use Illuminate\Http\Request;
use App\Http\Resources\Cars as CarsResource;


class CarController extends Controller
{
   

  


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
        $hall = Hall::with(['cars' => function ($query) {
            $query->select('cars.id','model', 'office_id', 'car_image', 'price')
                  ->with('office:id,name'); // Eager load the office with selected columns
        }])->findOrFail($hallId);     
        
            return response()->json([
                "Cars "=> CarsResource::collection($hall->cars) ,
                 "message" => 'Cars Returned successfully'
                ],200);
        
    }
    
}