<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function login($email){
        return response()->json(['roles' => ['student', 'admin'], 'email' => $email]);
    }

    // insert user data to database
     public function insertUser(Request $request){
        $userData = [
            'userId' => $request->input('userId'),
            'userType' => $request->input('userType'),
            'firstName' => $request->input('firstName'),
            'middleName' => $request->input('middleName'),
            'lastName' => $request->input('lastName'),
            'plmEmail' => $request->input('plmEmail'),
        ];

        // Create a new User model instance or get the existing one
        $user = Users::firstOrCreate(['plmEmail' => $userData['plmEmail']], $userData);

        if ($user->wasRecentlyCreated) {
            // This is a new user
            return response()->json(['message' => 'User inserted successfully']);
        } else {
            // User with the same email already exists
            return response()->json(['message' => 'User with this email already exists']);
        }
    }

    // update user data to database
    public function updateUser(){
        return response()->json(['message' => 'User data updated successfully!']);
    }

}
