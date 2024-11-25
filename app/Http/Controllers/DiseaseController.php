<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Disease;
use App\Http\Resources\DiseaseResource;
use App\Http\Requests\DiseaseRequestRequest;
use Illuminate\Support\Facades\Log;

class DiseaseController extends Controller
{
    function getAllDisease (Request $request) {
        $query = $request->query('search', ''); 
        $diseases = Disease::where('name', 'like', "%$query%")
                      ->paginate(5);
    
        return DiseaseResource::collection($diseases);
    }

    function getDiseaseById($id, Request $request) {
        $disease = Disease::with('affected_fish', 'product_recommendation')->where('id', $id)->first();

        if (!$disease) {
            return response()->json([
                'message' => 'Disease not found'
            ], 404);
        }
        
        return response(new DiseaseResource($disease)); ;
    }

    public function createDisease(Request $request)
    {   
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'disease_type' => 'required|string',
            'cause_agent' => 'required|string',
            'description' => 'required|string',
            'symptoms' => 'required|string',
            'note' => 'required|string',
            'prevention' => 'required|string',
            'affected_part' => 'required|array',
            'affected_part.*' => 'string',
            'affected_fish' => 'array',
            'product_recommendations' => 'array'
        ]);

        $disease = Disease::create([
            'name' => $validated['name'],
            'disease_type' => $validated['disease_type'],
            'cause_agent' => $validated['cause_agent'],
            'description' => $validated['description'],
            'symptoms' => $validated['symptoms'],
            'note' => $validated['note'],
            'prevention' => $validated['prevention'],
            'affected_part' => implode(',', $validated['affected_part'])
        ]);

        // Update affected fish relationships, reset to empty if missing
        if ($request->has('affected_fish')) {
            $disease->affected_fish()->sync($validated['affected_fish']);
        } else {
            $disease->affected_fish()->sync([]);
        }

        // Update product recommendations relationships, reset to empty if missing
        if ($request->has('product_recommendations')) {
            $disease->product_recommendation()->sync($validated['product_recommendations']);
        } else {
            $disease->product_recommendation()->sync([]);
        }

       
        return response()->json([
            'message' => 'Disease created successfully',
            'data' => new DiseaseResource($disease)
        ], 201);
    }

    public function updateDisease(Request $request, $id)
    {
        // Find the disease
        $disease = Disease::find($id);
        if (!$disease) {
            return response()->json([
                'message' => 'Disease not found'
            ], 404);
        }

        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'disease_type' => 'required|string',
            'cause_agent' => 'required|string',
            'description' => 'required|string',
            'symptoms' => 'required|string',
            'note' => 'required|string',
            'prevention' => 'required|string',
            'affected_part' => 'required|array',
            'affected_part.*' => 'string',
            'affected_fish' => 'nullable|array',
            'product_recommendations' => 'nullable|array',
        ]);

        // Update disease basic information
        $disease->update([
            'name' => $validated['name'],
            'disease_type' => $validated['disease_type'],
            'cause_agent' => $validated['cause_agent'],
            'description' => $validated['description'],
            'symptoms' => $validated['symptoms'],
            'note' => $validated['note'],
            'prevention' => $validated['prevention'],
            'affected_part' => implode(',', $validated['affected_part'])
        ]);

        // Update affected fish relationships if provided
        if ($request->has('affected_fish')) {
            $affectedFish = $validated['affected_fish'];
            $disease->affected_fish()->sync($affectedFish);
        }

        // Update product recommendations relationships if provided
        if ($request->has('product_recommendations')) {
            $productRecommendations = $validated['product_recommendations'];
            $disease->product_recommendation()->sync($productRecommendations);
        }

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
            "data" => DiseaseResource::collection(Disease::with('affected_fish', 'product_recommendation')->get())]);
    }
}
