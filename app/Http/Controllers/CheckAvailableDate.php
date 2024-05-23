<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckDateRequest;
use App\Models\reservation;
use Illuminate\Http\Request;

class CheckAvailableDate extends Controller
{
    public function CheckAvailableDate(CheckDateRequest $request){
        $validatedData = $request->validated();
    
        // Check if there is any existing reservation with the same hall, date, and time
        if (Reservation::where([
            ['hall_id', '=', $validatedData['hall_id']],
            ['Date', '=', $validatedData['Date']],
            ['time_id', '=', $validatedData['time_id']],
        ])->first()) 
        {
            // Return a response indicating invalid date selection
            return response(['message' => 'Invalid date. Please select another time.']);
        }
        return 'true';
    }
}
