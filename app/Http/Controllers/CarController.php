<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\car;
use App\Models\hall;
use Illuminate\Http\Request;

class CarController extends Controller
{
    use Traits\ValidatesData ;

    public function index()
    {
        return response(["THE Cars"=>  car::all()])
        ->setStatusCode(200,'cars returned successfully');
    }


    public function store(CarRequest $request)
    {     
        return response(["car"=> Car::create($this->validateData($request))])
        ->setStatusCode(200,'car created successfully');   
    }

  
    public function CarAccordingToHalls($hallId)
    {
        return response(["Cars "=> hall::find($hallId)->cars()->get()])
        ->setStatusCode(200,'Cars Returned successfully');
    }
    
}
