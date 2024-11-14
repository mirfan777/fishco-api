<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    function getAllComment(Request $request){
        $query = $request->query('search', '');
        $comments = Comment::where('body', 'like', "%$query%")
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
        $comment = Comment::create(
            [
                'user_id' => $request->user_id,
                'body' => $request->body
            ]
        );

        $data = new CommentResource($comment);

        return response()->json([
            'message' => 'Comment created successfully',
            'data' => $data
        ]);
    }

    function updateComment(Request $request, $id){
        $existingComment = Comment::find($id);

        if(!$existingComment){
            return response()->json([
                'message' => 'Comment not found'
            ], 404);
        }

        $response = $existingComment->update(
            [
                'body' => $request->body
            ]
        );

        return $response;
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
