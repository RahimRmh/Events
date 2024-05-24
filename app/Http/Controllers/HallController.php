<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryRequest;
use App\Models\hall;
use App\Http\Requests\StorehallRequest;
use App\Http\Requests\UpdatehallRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\hall as HallResource;
use App\Http\Resources\HallsAccordingToCategory as HallCategoryResource;
use App\Models\HallDetail;

class HallController extends Controller
{
   
    public function index(Request $request)
    {
       
        // Return the paginated halls 
        return HallResource::collection(hall::paginate(5));
    }
    
  
 

     public function store(StorehallRequest $request)
     {   
         // Ensure the user is authorized to create a new Hall
           $this->authorize('create', Hall::class);

        // Validate the incoming request data
        $validatedData = $request->validated();
          // Return a JSON response indicating successful Hall creation
          return response()->json([
            "HALL"=> new HallResource(hall::create($validatedData)),// Format the created Hall resource
            'message' => 'Hall created successfully'
         ],200);
     }
 
 
     public function show( $id )
     {
        // Return a JSON response with the hall data and a success message
         return response()->json(["THE HALL"=>new HallResource( Hall::findorFail($id))],200);
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

 
     
     public function destroy( $id)
     {
          // Delete the hall with the given ID from the database
           Hall::findOrFail($id)->delete();

           // Return a JSON response indicating that the hall has been deleted successfully
           return response()->json(['message' => 'Hall deleted successfully'], 200);
     }

     
     public function ClassifiedHalls(CategoryRequest $request)
      { // Return a JSON response containing the filtered halls along with a success message 

    //   return HallCategoryResource::collection(hall::where('category',$request->category)->
    //   select('id','name','hall_image')->paginate(10));

  ///Or  with  Sql view 
    // return HallDetail::where('category' , $request->category)->paginate(10);
     
     }
                              
 
     }
