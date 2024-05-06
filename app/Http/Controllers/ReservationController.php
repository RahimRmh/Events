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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Traits\ValidatesData ;

    public function index()
    {
        return response(["THE Reservations"=>ReservationResource::collection(reservation::all())])
        ->setStatusCode(200,'Reservations returned successfully');
    }



    public function store(StoreReservationRequest $request)
    {
        $validatedData = $this->validateData($request);

        if(reservation:: where([
            ['Date', '=', $validatedData['hall_id']],
            ['Date', '=', $validatedData['Date']],
            ['time_id', '=', $validatedData['time_id']],
        ])
        ->first()){
            return response(['message' => 'invalid date , You should select another time']);
        }

       $validatedData['user_id'] = auth()->id();
        $reservation = new ReservationResource(reservation::create($validatedData));

        $dishIds= $request->input('ids');

        foreach ($dishIds as $dishId) {
        $reservation->dishes()->attach($dishId);
        }
        return response(["THE Reservation"=> $reservation])->setStatusCode(200,'Reservation created successfully');
    }


    public function show( $id)
    {
        return response(["THE Reservation"=>new ReservationResource(reservation::findorFail($id))])
        ->setStatusCode(200,'Reservation returned successfully');
    }

 
    public function update(UpdateReservationRequest $request,  $id)
    {
        
        $reservation =  Reservation::findorFail($id);
        $reservation->update($this->validateData($request));
         return response(['reservation'=> $reservation])
         ->setStatusCode(200,'reservation Updated successfully');
    }

    public function destroy( $id)
    {
       Reservation::findOrFail($id)->delete();    
       return response(['message' => 'reservation deleted'])
       ->setStatusCode(200,'reservation deleted successfully');
    }
    
    public function ShowUserReservation(Request $request)
    {
        // if (!auth()->check()) {
        //     return response()->json(['error' => 'Unauthenticated'], 401);
        // }

       return response(['reservations' =>
       ReservationResource::collection(Reservation::where('user_id', auth()->user()->id)->get())])
       ->setStatusCode(200, 'Reservations returned successfully');
    }
    



}
