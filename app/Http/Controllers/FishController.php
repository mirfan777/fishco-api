<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\FishImage;
use App\Http\Resources\FishResource;
use Illuminate\Support\Facades\Log;
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

    public function getAllFishes(Request $request) {
        $query = Fish::query();

        if ($request->query('habitat')) {
            $query->where('habitat', $request->query('habitat'));
        }

        if ($request->query('food_type')) {
            $query->where('food_type', $request->query('food_type'));
        }

        if ($request->query('withImages') === 'true') {
            $query->with('images');
        }

        return response()->json(FishResource::collection($query->get()));

    }
    
    function getFishById($id, Request $request) {
        $status = $request->query('status');
        $fish = Fish::with(['images' => function($query) use ($status) {
            if ($status !== null) {
                $query->where('status', $status);
            }
        }])->find($id);

        $data = new FishResource($fish);
    
        return response()->json([
            "status" => 200,
            "message" => "Success",
            "data" => $data
        ]);
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

                
                $file->move(public_path('data/images'), $filename);

               
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
                    'min_salinity' => $request->min_salinity,
                    'max_salinity' => $request->max_salinity,
                    'min_aquarium' => $request->min_aquarium,
                    'habitat' => $request->habitat,
                    'overview' => $request->overview,
                    'average_size' => $request->average_size,
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
            Log::error('Error creating fish: ' . $e->getMessage());

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
            'name' => $request->name ?? $existingFish->name,
            'kingdom' => $request->kingdom ?? $existingFish->kingdom,
            'phylum' => $request->phylum ?? $existingFish->phylum,
            'class' => $request->class ?? $existingFish->class,
            'order' => $request->order ?? $existingFish->order,
            'family' => $request->family ?? $existingFish->family,
            'genus' => $request->genus ?? $existingFish->genus,
            'species' => $request->species ?? $existingFish->species,
            'colour' => $request->colour ?? $existingFish->colour,
            'food_type' => $request->food_type ?? $existingFish->food_type,
            'food' => $request->food ?? $existingFish->food,
            'venomous' => $request->venomous ?? $existingFish->venomous,
            'poisonous' => $request->poisonous ?? $existingFish->poisonous,
            'aggressive' => $request->aggressive ?? $existingFish->aggressive,
            'teritorial' => $request->teritorial ?? $existingFish->teritorial,
            'min_temperature' => $request->min_temperature ?? $existingFish->min_temperature,
            'max_temperature' => $request->max_temperature  ?? $existingFish->max_temperature,
            'min_ph' => $request->min_ph ?? $existingFish->min_ph,
            'max_ph' => $request->max_ph    ?? $existingFish->max_ph,
            'habitat' => $request->habitat ?? $existingFish->habitat,
            'overview' => $request->overview ?? $existingFish->overview,
            'average_size' => $request->average_size ?? $existingFish->average_size,
            'thumbnail' => $filename  
        ]);
    
        // Langkah 3: Kembalikan respons update
        return $response;
    }    
    
    function uploadFishImage(Request $request, $id) {
        $existingFish = Fish::find($id);

        if (!$existingFish) {
            return response()->json([
                'status' => 'error',
                'message' => 'Fish not found'
            ], 404);
        }


        if ($request->hasFile('image')) {
            

            $file = $request->file('image');
            $timestamp = time();
            $extension = $file->getClientOriginalExtension();
            $filename = $timestamp . '.' . $extension;
            $file->move(public_path('data/images'), $filename);

            $timestamp = time();
            $extension = $file->getClientOriginalExtension();
            $filename = $timestamp . '.' . $extension;

            $fishImage = FishImage::create([
                'fish_id' => $id,
                'image' => $filename,
                'status' => $request->status ?? 1,
                'disease_id' => ($request->status ?? 1) == 0 ? null : $request->disease_id
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Image uploaded successfully',
                'data' => $fishImage
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'No image provided'
        ], 422);
    }

    function deleteFishImage($id , $imgId) {
        $fishImage = FishImage::where('id', $imgId)->where('fish_id', $id)->first();

        if (!$fishImage) {
            return response()->json([
                'status' => 'error',
                'message' => 'Image not found in specified fish ID'
            ], 404);
        }

        $imagePath = public_path('data/images/' . $fishImage->image);

        // Delete the image record from the database
        if ($fishImage->delete()) {
            // Check if the image file exists and delete it
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Image deleted successfully'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Failed to delete image'
        ], 500);
    }

    public function deleteFish($id)
    {
        try {
            $fish = Fish::findOrFail($id);
            $fish->delete();
            return response()->json(['success' => 'Fish deleted successfully']);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Failed to delete fish: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete fish, please try again'], 500);
        }
    }
    
    
}