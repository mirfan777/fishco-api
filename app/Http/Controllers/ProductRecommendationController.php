<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\DiseaseResource;
use App\Models\Fish;
use App\Models\Disease;
use App\Models\Medicine;
use App\Models\Product;

class ProductRecommendationController extends Controller
{
    function getRecommendationTreatmentProduct($diseaseId){
        $disease = Disease::with('affected_fish' , 'product_recommendation')->find($diseaseId);

        return response()->json([
            'data' => new DiseaseResource($disease)
        ]);
    }

    // $i = App\Http\Resources\DiseaseResource::collection(
    //     App\Models\Disease::with('affected_fish', 'product_recommendation')->where('id', 1)->get()
    // );


}
