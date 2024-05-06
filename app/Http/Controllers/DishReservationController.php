<?php

namespace App\Http\Controllers;

use App\Models\dish;
use App\Models\reservation;
use Illuminate\Http\Request;

class DishReservationController extends Controller
{
    public function store($dishId, $reservationId)
    {
        $dish = dish::find($dishId);
        $reservation = reservation::find($reservationId);

        if (!$dishId || !$reservationId) {
            return response()->json(['message' => 'Dish or Reservation not found.'], 404);
        }

        $dish->reservations()->attach($reservationId);

        return response()->json(['message' => 'dish associated with reservation successfully.'], 200);
    }}
