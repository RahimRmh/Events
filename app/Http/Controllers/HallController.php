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
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index(Request $request)
    {
        // Retrieve all halls
        $halls = Hall::all();
    
        // Return the halls as a JSON response
        return response()->json([
            "HALLS" => HallResource::collection($halls),
            'message' => 'Halls returned successfully',
        ], 200);
    }
    
  
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(StorehallRequest $request)
     {
         $this->authorize('create', Hall::class);

        $validatedData = $request->validated();

        $image = $request->file('image')->store('images', 'public'); // Store the image in the 'public/images' directory
        $validatedData['image'] = $image ;
         return response()->json(["HALL"=> new HallResource(hall::create($validatedData)),
         'message' => 'Hall created successfully'],200);
     }
 
     /**
      * Display the specified resource.
      */
     public function show( $id )
     {
        // Return a JSON response with the hall data and a success message
         return response()->json(["THE HALL"=> Hall::findorFail($id)],200);
     }
 

     public function update(UpdatehallRequest $request, $id)
{
    // Ensure the user is authorized to update halls
    $this->authorize('update', Hall::class);

    // Find the hall by its ID and create a resource for it
    $hall = new HallResource(Hall::findOrFail($id));
    
    // Update the hall's data with the validated data from the request
    $hall->update($request->validated());

    // Return a JSON response confirming the update along with the updated hall's information
    return response()->json(['The Hall' => $hall, 'message' => 'Hall Updated successfully'], 200);
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
      { // Return a JSON response containing the filtered halls along with a success message 
      return response()->json(["The Halls Where their category is $request->category"
      =>HallResource::collection(hall::where('category',$request->category)->get()),
       'message' => 'Halls Returned successfully'],200);
     }
 

                                      
               
                                      
 
     }
