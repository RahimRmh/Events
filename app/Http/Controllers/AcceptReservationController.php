<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation;
use App\Events\ReservationAccepted;

class AcceptReservationController extends Controller
{
  public function AcceptReservation($reservationId){
    // Find the reservation by its ID or throw an exception if not found
    $reservation = Reservation::findOrFail($reservationId);

    // Update the status of the reservation to 'confirmed'
    $reservation->status = 'confirmed';
    
    // Save the changes to the reservation in the database
    $reservation->save();

    // Trigger an event to notify that the reservation has been accepted
    event(new ReservationAccepted($reservation));
}


    }

