<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

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

    function createUser(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash('sha256', $request->password),
            'phone_number' => $request->phone_number,
            'role' =>$request->role,
            'address' => $request->address,
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'data' => new UserResource($user)
        ]);
    }

    function deleteUser($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }

    function updateUser($id, Request $request) {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|confirmed',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);
    
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->phone_number = $validatedData['phone_number'];
        $user->address = $validatedData['address'];
        $user->save();
    
        return response()->json([
            'message' => 'User updated successfully',
            'data' => new UserResource($user)
        ]);
    }
}