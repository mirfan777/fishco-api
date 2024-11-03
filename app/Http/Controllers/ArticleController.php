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
        $article = Article::create($request->all());

        return response()->json([
            'message' => 'Article created successfully',
            'data' => new ArticleResource($article)
        ]);
    }

    function updateArticle(Request $request, $id){
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                'message' => 'Article not found'
            ], 404);
        }

        $article->update($request->all());

        return response()->json([
            'message' => 'Article updated successfully',
            'data' => new ArticleResource($article)
        ]);
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
