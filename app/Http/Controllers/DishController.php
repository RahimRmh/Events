<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRequest;
use App\Models\dish;
use App\Models\hall;
use Illuminate\Http\Request;

class DishController extends Controller
{ 
    use Traits\ValidatesData;
  
    public function index()
    {
        return response(["dishes"=> dish::all()])
        ->setStatusCode(200,'dishes returned successfully');
    }

    public function store(DishRequest $request)
    { 
        return response(["THE Dish"=>  dish::create($this->validateData($request))])
        ->setStatusCode(200,'dish created successfully');
    }

    public function DishAccordingToHalls($hallId)
    {
        return response(["Dishes"=>hall::find($hallId)->dishes()->get()])
        ->setStatusCode(200,'Dishes Returned successfully');
    }
    
}
