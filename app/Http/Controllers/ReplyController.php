<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Replies;
use App\Http\Resources\RepliesResource;

class ReplyController extends Controller
{
    function getAllReplies () {
        return RepliesResource::collection(Replies::paginate(5));
    }

    function getRepliesById($id) {
        $replies = Replies::find($id);

        if (!$replies) {
            return response()->json([
                'message' => 'Replies not found'
            ], 404);
        }
    
        return new RepliesResource($replies);
    }

    function createReplies(Request $request) {
        $replies = Replies::create($request->all());

        $data = new RepliesResource($replies);

        return response()->json([
            'message' => 'Replies created successfully',
            'data' => $data
        ]);
    }

    function updateReplies(Request $request, $id) {
        $replies = Replies::find($id);

        if (!$replies) {
            return response()->json([
                'message' => 'Replies not found'
            ], 404);
        }

        $replies->update($request->all());

        return response()->json([
            'message' => 'Replies updated successfully',
            'data' => new RepliesResource($replies)
        ]);
    }

    function deleteReplies($id) {
        $replies = Replies::find($id);

        if (!$replies) {
            return response()->json([
                'message' => 'Replies not found'
            ], 404);
        }

        $replies->delete();

        return response()->json([
            'message' => 'Replies deleted successfully'
        ]);
    }
}
