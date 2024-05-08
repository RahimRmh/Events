<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\hall;
use Illuminate\Http\Request;

class HallCarController extends Controller
{
 
public function store($hallId, $carId)
{
    // Find the hall and car by their IDs
    $hall = hall::find($hallId);
    $car = car::find($carId);

    // Check if either the hall or car is not found
    if (!$hall || !$car) {
        return response()->json(['message' => 'Hall or car not found.'], 404);
    }

    // Associate the car with the hall
    $hall->cars()->attach($carId);

    return response()->json(['message' => 'Car associated with hall successfully.'], 200);
}

}
