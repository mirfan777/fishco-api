<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;
use App\Http\Resources\FishResource;

class FishController extends Controller
{
    function getAllFish (Request $request) {
        $query = $request->query('search', ''); 
        $fishes = Fish::where('name', 'like', "%$query%")
                      ->orWhere('species', 'like', "%$query%")
                      ->paginate(5);
    
        return FishResource::collection($fishes);
    }
    
    function getFishById($id, Request $request) {
        $status = $request->query('status');
        $fish = Fish::with(['images' => function($query) use ($status) {
            if ($status !== null) {
                $query->where('status', $status);
            }
        }])->find($id);
    
        return new FishResource($fish);
    }
    
    function createFish(Request $request){
    
        $response = Fish::create([
            'name' => $request->name,
            'kingdom' => $request->kingdom,
            'phylum' => $request->phylum,
            'class' => $request->class,
            'order' => $request->order,
            'family' => $request->family,
            'genus' => $request->genus,
            'species' => $request->species,
            'colour' => $request->colour,
            'food_type' => $request->food_type,
            'food' => $request->food,
            'min_temperature' => $request->min_temperature,
            'max_temperature' => $request->max_temperature,
            'min_ph' => $request->min_ph,
            'max_ph' => $request->max_ph,
            'habitat' => $request->habitat
        ]);
    
        return $response;
    
    }
    
    function updateFish(Request $request, $id){
        $response = Fish::where('id', $id)->update($request->all());
    
        return $response;
    }
    
    function deleteFish($id){
        $response = Fish::where('id', $id)->delete();
    
        return $response;
    } 
    
}
