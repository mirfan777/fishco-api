<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    function getAllProduct (Request $request) {
        $query = $request->query('search', ''); 
        $products = Products::where('name', 'like', "%$query%")
                      ->paginate(5);
    
        return ProductResource::collection($products);
    }

    function getProductById($id, Request $request) {
        $product = Products::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
    
        return new ProductResource($product);
    }

    function createProduct(Request $request) {
        $product = Products::create($request->all());

        return response()->json([
            'message' => 'Product created successfully',
            'data' => new ProductResource($product)
        ]);
    }

    function updateProduct(Request $request, $id) {
        $product = Products::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product)
        ]);
    }

    function deleteProduct($id) {
        $product = Products::find($id);

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
}
