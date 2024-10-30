<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affiliate;
use App\Http\Resources\AffiliateResource;

class AffiliateController extends Controller
{
    function getAllAffiliate (Request $request) {
        $query = $request->query('search', ''); 
        $affiliates = Affiliate::where('name', 'like', "%$query%")
                      ->paginate(5);
    
        return AffiliateResource::collection($affiliates);
    }

    function getAffiliateById($id, Request $request) {
        $affiliate = Affiliate::find($id);

        if (!$affiliate) {
            return response()->json([
                'message' => 'Affiliate not found'
            ], 404);
        }
    
        return new AffiliateResource($affiliate);
    }

    function createAffiliate(Request $request) {
        $affiliate = Affiliate::create($request->all());

        return response()->json([
            'message' => 'Affiliate created successfully',
            'data' => new AffiliateResource($affiliate)
        ]);
    }

    function updateAffiliate(Request $request, $id) {
        $affiliate = Affiliate::find($id);

        if (!$affiliate) {
            return response()->json([
                'message' => 'Affiliate not found'
            ], 404);
        }

        $affiliate->update($request->all());

        return response()->json([
            'message' => 'Affiliate updated successfully',
            'data' => new AffiliateResource($affiliate)
        ]);
    }

    function deleteAffiliate($id) {
        $affiliate = Affiliate::find($id);

        if (!$affiliate) {
            return response()->json([
                'message' => 'Affiliate not found'
            ], 404);
        }

        $affiliate->delete();

        return response()->json([
            'message' => 'Affiliate deleted successfully'
        ]);
    }
}
