<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    function getAllProduct (Request $request) {
        $query = $request->query('search', ''); 
        $product = Product::where('name', 'like', "%$query%")
                      ->paginate(5);
    
        return ProductResource::collection($product);
    }

    function getProductById($id, Request $request) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
    
        return new ProductResource($product);
    }

    public function createProduct(Request $request){
        try {
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $filename = time() . '_' . $thumbnail->getClientOriginalName();
                $thumbnail->move(public_path('data/thumbnails'), $filename);

                // Create product
                $product = Product::create([
                    'name' => $request->name,
                    'category' => $request->category,
                    'description' => $request->description,
                    'price' => $request->price,
                    'thumbnail' => $filename, // Store relative path
                    'link' => $request->link,
                ]);

                return response()->json([
                    'message' => 'Product created successfully',
                    'data' => new ProductResource($product)
                ]);
            } else {
                return response()->json([
                    'message' => 'Please upload a thumbnail'
                ], 400);
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error('Failed to create product: ' . $e->getMessage());

            return response()->json([
                'message' => 'Failed to create product',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function updateProduct(Request $request, $id){
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('data/thumbnails'), $filename);
            $product->thumbnail = $filename; // Update relative path
        }

        $product->update($request->except('thumbnail'));

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product)
        ]);
    }

    function deleteProduct($id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }

    public function getAllProducts() {
        return response()->json([
            "data" => Product::all()
        ]);
    }
}
