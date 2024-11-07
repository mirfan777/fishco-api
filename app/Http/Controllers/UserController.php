<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    function getAllUsers (Request $request) {
        $users = User::all();

        return UserResource::collection($users);
    }

    function getAllUser (Request $request) {
        $query = $request->query('search', ''); 
        $users = User::where('name', 'like', "%$query%")
                      ->orWhere('email', 'like', "%$query%")
                      ->orWhere('phone_number', 'like', "%$query%")
                      ->orWhere('address', 'like', "%$query%")
                      ->paginate(5);

        return UserResource::collection($users);
    }
    
    function getUserById($id, Request $request) {
        $user = User::find($id);
    
        return response()->json([
            "status" => 200,
            "message" => "Success",
            "data" => $user
        ]);
    }
}
