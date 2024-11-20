<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aquarium;
use App\Http\Resources\AquariumResource;

class AquariumController extends Controller
{
    function getAllAquarium(){
        return AquariumResource::collection(Aquarium::with('aquariumfishes')->get());
    }

    function getAquarium($id){
        return new AquariumResource(Aquarium::find($id));
    }

    function createAquarium(Request $request){
        $aquarium = Aquarium::create($request->all());

        $data = new AquariumResource($aquarium);

        return response()->json([
            'message' => 'Aquarium created successfully',
            'data' => $data
        ]);
    }

    function updateAquarium(Request $request, $id){
        $aquarium = Aquarium::find($id);

        if (!$aquarium) {
            return response()->json([
                'message' => 'Aquarium not found'
            ], 404);
        }

        $aquarium->update($request->all());

        return response()->json([
            'message' => 'Aquarium updated successfully',
            'data' => new AquariumResource($aquarium)
        ]);
    }

    function deleteAquarium($id){
        $aquarium = Aquarium::find($id);

        if (!$aquarium) {
            return response()->json([
                'message' => 'Aquarium not found'
            ], 404);
        }

        $aquarium->delete();

        return response()->json([
            'message' => 'Aquarium deleted successfully'
        ]);
    }
}
