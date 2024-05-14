<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHallImageRequest;
use App\Models\HallImage;
use Illuminate\Http\Request;
use App\Http\Resources\hallimages as HallImagesResource;


class HallImageController extends Controller
{
    
    public function index()
    {    
        // Retrieve and format all hall images, then return them as a JSON response
        return response()->json([
            "images" => HallImagesResource::collection(HallImage::all()),
            'message' => 'Images returned successfully',
        ], 200);
    }

 
    public function store(StoreHallImageRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Store the uploaded image file in the 'images' directory within the 'public' disk
        $validatedData['path'] = $request->file('path')->store('images', 'public') ;

        // Return a JSON response indicating successful image creation
            return response()->json([
            'image'=> new HallImagesResource(HallImage::create($validatedData)),// Format the created image resource
            'message' => 'image created successfully'
        ],200);
    }

    public function destroy( $id)
     {
          // Delete the hall image with the given ID from the database
           HallImage::findOrFail($id)->delete();

           // Return a JSON response indicating that the image has been deleted successfully
           return response()->json(['message' => 'Image deleted successfully'], 200);
     }
}
