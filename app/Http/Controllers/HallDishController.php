<?php

namespace App\Http\Controllers;

use App\Models\dish;
use App\Models\hall;
use Illuminate\Http\Request;

class HallDishController extends Controller
{   
public function store($hallId, $dishId)
{
    // Find the hall and dish by their IDs
    $hall = hall::find($hallId);
    $dish = dish::find($dishId);

    // Check if either the hall or dish is not found
    if (!$hall || !$dish) {
        return response()->json(['message' => 'Hall or dish not found.'], 404);
    }

    // Associate the dish with the hall
    $hall->dishes()->attach($dishId);

    return response()->json(['message' => 'Dish associated with hall successfully.'], 200);
}

}
