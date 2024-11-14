<?php

namespace App\Http\Controllers;


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

    function getDiseaseById($id) {
        $disease = Disease::find($id);

        if (!$disease) {
            return response()->json([
                'message' => 'Disease not found'
            ], 404);
        }
    
        return new DiseaseResource($disease);
    }

    function createDisease(Request $request) {
        $disease = Disease::create($request->all());

        $data = new DiseaseResource($disease);

        return response()->json([
            'message' => 'Disease created successfully',
            'data' => $data
        ]);
    }

    function updateDisease(Request $request, $id) {
        $disease = Disease::find($id);

        if (!$disease) {
            return response()->json([
                'message' => 'Disease not found'
            ], 404);
        }

        $disease->update($request->all());

        return response()->json([
            'message' => 'Disease updated successfully',
            'data' => new DiseaseResource($disease)
        ]);
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

    public function getAllDiseases() {
        return response()->json([
            "data" => Disease::all()]);
    }
}
