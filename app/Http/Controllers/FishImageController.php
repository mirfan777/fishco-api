<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FishImage;
use App\Http\Resources\FishImageResource;

class FishImageController extends Controller
{
    function getAllFishImage(){
        return FishImageResource::collection(FishImage::paginate(5));
    }

    function getFishImage($id){
        $query = FishImage::find($id);

        if(!$query){
            return response()->json([
                'message' => 'Fish Image not found'
            ], 404);
        }

        return new FishImageResource($query);
    }

    function createFishImage(Request $request){
        $query = FishImage::create($request->all());

        return response()->json([
            'message' => 'Fish Image created successfully',
            'data' => new FishImageResource($query)
        ]);
    }

    function updateFishImage(Request $request, $id){
        $query = FishImage::find($id);

        if(!$query){
            return response()->json([
                'message' => 'Fish Image not found'
            ], 404);
        }

        $query->update($request->all());

        return response()->json([
            'message' => 'Fish Image updated successfully',
            'data' => new FishImageResource($query)
        ]);
    }

    function deleteFishImage($id){
        $query = FishImage::find($id);

        if(!$query){
            return response()->json([
                'message' => 'Fish Image not found'
            ], 404);
        }

        $query->delete();

        return response()->json([
            'message' => 'Fish Image deleted successfully'
        ]);
    }
}
