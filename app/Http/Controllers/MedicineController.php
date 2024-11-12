<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Http\Resources\MedicineResource;

class MedicineController extends Controller
{
    function getAllMedicine (Request $request) {
        $query = $request->query('search', ''); 
        $medicines = Medicine::where('name', 'like', "%$query%")
                      ->paginate(5);
    
        return MedicineResource::collection($medicines);
    }

    function getMedicineById($id, Request $request) {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json([
                'message' => 'Medicine not found'
            ], 404);
        }
    
        return new MedicineResource($medicine);
    }

    function createMedicine(Request $request) {
        $medicine = Medicine::create($request->all());

        return response()->json([
            'message' => 'Medicine created successfully',
            'data' => new MedicineResource($medicine)
        ]);
    }

    function updateMedicine(Request $request, $id) {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json([
                'message' => 'Medicine not found'
            ], 404);
        }

        $medicine->update($request->all());

        return response()->json([
            'message' => 'Medicine updated successfully',
            'data' => new MedicineResource($medicine)
        ]);
    }
    
    function deleteMedicine($id) {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json([
                'message' => 'Medicine not found'
            ], 404);
        }

        $medicine->delete();

        return response()->json([
            'message' => 'Medicine deleted successfully'
        ]);
    }

    public function getDropdownData(){
        $diseases = \App\Models\Disease::all(['id', 'name']);
        $fishes = \App\Models\Fish::all(['id', 'name']);
        
        return response()->json([
            'diseases' => $diseases,
            'fishes' => $fishes
        ]);
    }

    public function getAllMedicines() {
        return response()->json([
            "data" => Medicine::all()]);
    }
}
