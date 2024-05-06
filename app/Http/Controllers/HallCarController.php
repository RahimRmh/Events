<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\hall;
use Illuminate\Http\Request;

class HallCarController extends Controller
{
    public function store($hallId, $carId)
    {
        $hall = hall::find($hallId);
        $car = car::find($carId);

        if (!$hall || !$car) {
            return response()->json(['message' => 'Hall or car not found.'], 404);
        }

        $hall->cars()->attach($carId);

        return response()->json(['message' => 'car associated with hall successfully.'], 200);
    }
}
