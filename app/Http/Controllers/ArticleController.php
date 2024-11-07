<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\ArticleResource;

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

    function createArticle(Request $request){
        try {
            if($request->hasFile('thumbnail')){
                $file = $request->file('thumbnail');
                $timestamp = time();
                $extension = $file->getClientOriginalExtension();
                $filename = $timestamp . '.' . $extension;

                $file->move(public_path('data/images'), $filename);

                $article = Article::create([
                    'title' => $request->title,
                    'body' => $request->body,
                    'thumbnail' => $filename
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
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create article'
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
