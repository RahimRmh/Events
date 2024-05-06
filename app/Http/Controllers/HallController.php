<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryRequest;
use App\Models\hall;
use App\Http\Requests\StorehallRequest;
use App\Http\Requests\UpdatehallRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\hall as HallResource;

class HallController extends Controller
{
    use Traits\ValidatesData ;
    /**
     * Display a listing of the resource.
     *
     * 
     */
  
     public function index(Request $request)
     {
          
         return response(["HALLS"=>HallResource::collection( hall::all())])->
         setStatusCode(200,'Halls returned successfully');
     }
 
  
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(StorehallRequest $request)
     {
        //  $this->authorize('create',resturant::class);
        $validatedData = $this->validateData($request);

        $image = $request->file('image')->store('images', 'public'); // Store the image in the 'public/images' directory
        $validatedData['image'] = $image ;
         return response(["HALL"=> new HallResource(hall::create($validatedData))  ])->
         setStatusCode(200,'Hall created successfully');
     }
 
     /**
      * Display the specified resource.
      */
     public function show( $id )
     {
    
         return response(["THE HALL"=> Hall::findorFail($id)])->
         setStatusCode(200,'Hall returned successfully');
     }
 

     public function update(UpdatehallRequest $request, $id)
     {
        //  $this->authorize('update',resturant::class);
    

        
        $hall = new HallResource(Hall::findorFail($id));
        $hall->update($this->validateData($request));

         return response(['The Hall'=> $hall])->
         setStatusCode(200,'Hall Updated successfully');
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy( $id)
     {
        //  $this->authorize('delete',resturant::class);
 
         Hall::findOrFail($id)->delete();    
         return response(['message' => 'Hall deleted'])->
         setStatusCode(200,'Hall deleted successfully');
     }

     
     public function ClassifiedHalls(CategoryRequest $request)
     {
      return response(["The Halls Where their category is $request->category"
      =>HallResource::collection(hall::where('category',$request->category)
      ->get())])->setStatusCode(200,'Halls Returned successfully');
     }
 

                                      
               
                                      
 
     }
