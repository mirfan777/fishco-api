<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    function getAllComment(Request $request){
        $query = $request->query('search', '');
        $comments = Comment::where('name', 'like', "%$query%")
                      ->paginate(5);
        return CommentResource::collection($comments);
    }

    function getComment($id){
        $comment = Comment::find($id);

        if(!$comment){
            return response()->json([
                'message' => 'Comment not found'
            ], 404);
        }

        return new CommentResource($comment);
    }

    function addComment(Request $request){
        $comment = Comment::create($request->all());

        $data = new CommentResource($comment);

        return response()->json([
            'message' => 'Comment created successfully',
            'data' => $data
        ]);
    }

    function updateComment(Request $request, $id){
        $comment = Comment::find($id);

        if(!$comment){
            return response()->json([
                'message' => 'Comment not found'
            ], 404);
        }

        $comment->update($request->all());

        return response()->json([
            'message' => 'Comment updated successfully',
            'data' => new CommentResource($comment)
        ]);
    }

    function deleteComment($id){
        $comment = Comment::find($id);

        if(!$comment){
            return response()->json([
                'message' => 'Comment not found'
            ], 404);
        }

        $comment->delete();

        return response()->json([
            'message' => 'Comment deleted successfully'
        ]);
    }
}
