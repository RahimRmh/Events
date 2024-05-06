<?php

namespace App\Http\Controllers;

use App\Models\dish;
use App\Models\hall;
use Illuminate\Http\Request;

class HallDishController extends Controller
{
    public function store($hallId, $dishId)
    {
        $hall = hall::find($hallId);
        $dish = dish::find($dishId);

        if (!$hall || !$dish) {
            return response()->json(['message' => 'Hall or dish not found.'], 404);
        }

        $hall->dishes()->attach($dishId);

        return response()->json(['message' => 'Dish associated with hall successfully.'], 200);
    }
}
