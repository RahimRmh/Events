<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\reservation as ReservationResource;

class ReservationController extends Controller
{
 

    public function store(StoreReservationRequest $request)

      {
        // Validate incoming request data
        $validatedData = $request->validated();
    
        // Check if there is any existing reservation with the same hall, date, and time
        if (Reservation::where([
            ['hall_id', '=', $validatedData['hall_id']],
            ['Date', '=', $validatedData['Date']],
            ['time_id', '=', $validatedData['time_id']],
        ])->first()) {
            // Return a response indicating invalid date selection
            return response(['message' => 'Invalid date. Please select another time.']);
        }
    
        // Assign the user ID of the authenticated user to the reservation
        $validatedData['user_id'] = auth()->id();
    
        // Create a new reservation instance and save it to the database
        $reservation = new ReservationResource(Reservation::create($validatedData));
    
        // Retrieve dish IDs from the request
        $dishIds = $request->input('ids');
    
        // Attach each dish to the reservation
        foreach ($dishIds as $dishId) {
          
            $reservation->dishes()->attach($dishId);
        }
    
        // Return a JSON response indicating successful reservation creation
        return response()->json(["The Reservation" => $reservation, 'message' => 'Reservation created successfully']);
      }


    public function show( $id)
    {
        // Return a JSON response with selected reservation  and status code
        return response()->json(["THE Reservation"=>new ReservationResource(reservation::findorFail($id))
        ,'message' => 'Reservation returned successfully'],200);
    }

 
    public function update(UpdateReservationRequest $request,  $id)
    {
         // Validate incoming request data
        $validatedData = $request->validated();

         // Find the reservation by its ID or throw an exception
        $reservation =  Reservation::findorFail($id);

         // Authorize the update action
        $this->authorize('update',$reservation);

        // Assign the authenticated user's ID to the reservation
        $validatedData['user_id'] = auth()->id();

        // Update the reservation with the validated data
          $reservation->update($validatedData);

       // Return a JSON response with the updated reservation and status code
       return response()->json(['reservation'=> new ReservationResource($reservation),'message' => 'Reservations updated successfully'],200);
    }

    public function destroy( $id)
    {      
       // Find the reservation by its ID or throw an exception
      $reservation =  Reservation::findorFail($id);
      
       // Authorize the delete action
      $this->authorize('delete',$reservation);

      $reservation->delete();    
     // Return a JSON response with delete reservation message and status code
       return response()->json(['message' => 'reservation deleted'],200);
       
    }
    
    public function ShowUserReservation()
    {
        // Return a JSON response with user's reservations and status code
       return response()->json([
        'reservations'=> ReservationResource::collection(
        Reservation::where('user_id', auth()->user()->id)
        ->select('id','hall_id','time_id','status','Date','Total_Price','car_id')
        ->with([
          'dishes:id,name,dish_image',
          'time:id,date_1',
          'hall:id,name',
          'car:id,model'
      ])
        ->get())]
         ,200);
    }
    

}
