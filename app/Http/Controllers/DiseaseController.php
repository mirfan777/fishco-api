<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiseaseRequest;
use Illuminate\Http\Request;
use App\Models\Disease;
use App\Http\Resources\DiseaseResource;
use App\Http\Requests\DiseaseRequestRequest;

class DiseaseController extends Controller
{
    function getAllDisease (Request $request) {
        $query = $request->query('search', ''); 
        $diseases = Disease::where('name', 'like', "%$query%")
                      ->paginate(5);
    
        return DiseaseResource::collection($diseases);
    }

    function getDiseaseById($id, Request $request) {
        $disease = Disease::find($id);

        if (!$disease) {
            return response()->json([
                'message' => 'Disease not found'
            ], 404);
        }
    
        return new DiseaseResource($disease);
    }


    function deleteDisease($id) {
        $disease = Disease::find($id);

        if (!$disease) {
            return response()->json([
                'message' => 'Disease not found'
            ], 404);
        }

        $disease->delete();

        return response()->json([
            'message' => 'Disease deleted successfully'
        ]);
    }
}
