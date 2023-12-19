<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function login($email){
        return response()->json(['roles' => ['student', 'admin'], 'email' => $email]);
    }

    // insert user data to database
     public function insertUser(Request $request){
        $userData = [
            'userType' => $request->input('userType'),
            'firstName' => $request->input('firstName'),
            'middleName' => $request->input('middleName'),
            'lastName' => $request->input('lastName'),
            'plmEmail' => $request->input('email'),
        ];

        // Create a new User model instance
        $user = new users($userData);

        // Save the user to the database
        $user->save();

        return response()->json(['message' => 'User inserted successfully']);
     }

    // update user data to database
    public function updateUser(){
        return response()->json(['message' => 'User data updated successfully!']);
    }

}
