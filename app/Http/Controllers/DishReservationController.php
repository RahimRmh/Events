<?php

namespace App\Http\Controllers;

use App\Models\dish;
use App\Models\reservation;
use Illuminate\Http\Request;

class DishReservationController extends Controller
{

public function store($dishId, $reservationId)
{
    // Find the dish and reservation by their IDs
    $dish = dish::find($dishId);
    $reservation = reservation::find($reservationId);

    // Check if either the dish or reservation is not found
    if (!$dish || !$reservation) {
        return response()->json(['message' => 'Dish or Reservation not found.'], 404);
    }

    // Associate the dish with the reservation
    $dish->reservations()->attach($reservationId);

    return response()->json(['message' => 'Dish associated with reservation successfully.'], 200);
}
}
