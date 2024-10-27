<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;
use App\Http\Resources\FishResource;
use App\Http\Requests\FishRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
    
    function createFish(Request $request)
    {
        try {
            // Handle file upload
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $timestamp = time();
                $extension = $file->getClientOriginalExtension();
                $filename = $timestamp . '.' . $extension;

                // Store the file in public/data/images directory
                $file->move(public_path('data/images'), $filename);

                // Create fish record with all data
                $fish = Fish::create([
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
                    'habitat' => $request->habitat,
                    'overview' => $request->overview,
                    'thumbnail' => $filename 
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Fish created successfully',
                    'data' => $fish
                ], 201);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'No thumbnail file provided'
            ], 422);

        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error creating fish: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while creating the fish record',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    function updateFish(Request $request, $id) {
        $existingFish = Fish::where('id', $id)->first();

        // Langkah 1: Cek apakah file baru diunggah
        if ($request->hasFile('thumbnail')) {
            // a. Ambil file dari request
            $file = $request->file('thumbnail');
            
            // b. Buat nama file baru dengan timestamp unix
            $timestamp = time();
            $extension = $file->getClientOriginalExtension();
            $filename = $timestamp . '.' . $extension;
            
            // c. Pindahkan file ke direktori public/data/images
            $file->move(public_path('data/images'), $filename);
            
            // d. Gunakan nama file baru sebagai nilai `thumbnail`
        } else {
            // Jika tidak ada file baru, tetap gunakan nama file lama
            $filename = $existingFish->thumbnail;
        }
    
        // Langkah 2: Perbarui data di tabel `fish`
        $response = $existingFish->update([
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
            'habitat' => $request->habitat,
            'overview' => $request->overview,
            'thumbnail' => $filename 
        ]);
    
        // Langkah 3: Kembalikan respons update
        return $response;
    }    
    
    function deleteFish($id){
        $response = Fish::where('id', $id)->delete();
    
        return $response;
    } 
    
}
