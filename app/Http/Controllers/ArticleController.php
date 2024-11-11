<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\ArticleResource;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    function getAllArticle(Request $request){
        $query = $request->query('search', '');
        $articles = Article::where('title', 'like', "%$query%")
                      ->paginate(5);
        
        return ArticleResource::collection($articles);
    }

    function getArticleById($id, Request $request){
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                'message' => 'Article not found'
            ], 404);
        }
    
        return new ArticleResource($article);
    }

    public function createArticle(Request $request)
    {
        try {
            // Validate request data
            $request->validate([
                'title' => 'required|string|max:255',
                'body' => 'required|string',
                'slug' => 'required|string',
                'user_id' => 'required|exists:users,id',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Check if thumbnail is uploaded
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailPath = $thumbnail->store('thumbnails', 'public');

                // Create article
                $article = Article::create([
                    'title' => $request->title,
                    'body' => $request->body,
                    'slug' => $request->slug,
                    'user_id' => $request->user_id,
                    'thumbnail' => $thumbnailPath,
                ]);

                return response()->json([
                    'message' => 'Article created successfully',
                    'data' => new ArticleResource($article)
                ]);
            } else {
                return response()->json([
                    'message' => 'Please upload a thumbnail'
                ], 400);
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error('Failed to create article: ' . $e->getMessage());

            return response()->json([
                'message' => 'Failed to create article',
                'error' => $e->getMessage()
            ], 400);
        }
    }


    function updateArticle(Request $request, $id){
        $existingArticle = Article::find($id);

        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $timestamp = time();
            $extension = $file->getClientOriginalExtension();
            $filename = $timestamp . '.' . $extension;

            $file->move(public_path('data/images'), $filename);

            $existingArticle->thumbnail = $filename;
        }else{
            $filename = $existingArticle->thumbnail;
        }

        $response = $existingArticle->update([
            'title' => $request->title,
            'body' => $request->body,
            'thumbnail' => $filename
        ]);

        return $response;
    }

    function deleteArticle($id){
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                'message' => 'Article not found'
            ], 404);
        }

        $article->delete();

        return response()->json([
            'message' => 'Article deleted successfully'
        ]);
    }
}
