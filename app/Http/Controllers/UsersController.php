<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function login($email){
        $user = Users::where('plmEmail', $email)->first();

        if ($user) {
            $roleNames = ['Admin', 'Student', 'StudentGrad', 'ChairpersonUndergrad', 'ChairpersonGrad', 'Faculty'];
            $userTypes = [];

            foreach ($roleNames as $roleName) {
                $method = 'has' . $roleName . 'Role';

                if ($user->$method()->exists()) {
                    $userTypes[] = $roleName;
                }
            }

            return response()->json(['userTypes' => $userTypes]);
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }

    // insert user data to database
    public function insertUser(Request $request){
        $userData = [
            'id' => $request->input('userId'),
            'firstName' => $request->input('firstName'),
            'middleName' => $request->input('middleName'),
            'lastName' => $request->input('lastName'),
            'plmEmail' => $request->input('plmEmail'),
        ];

        // Create a new User model instance or get the existing one
        $user = Users::firstOrCreate(['plmEmail' => $userData['plmEmail']], $userData);

        if ($user->wasRecentlyCreated) {
            // This is a new user
            $userTypes = $request->input('userType');
            foreach($userTypes as $userType) {
                // Create a new instance of the corresponding model for each userType
                $role = app("App\\Models\\{$userType}"); // Adjust the namespace based on your application
                $role->create(['userId' => $user->id]); // Adjust the column name based on your table structure
            }

            return response()->json(['message' => 'User inserted successfully']);
        } else {
            // User with the same email already exists
            return response()->json(['message' => 'User with this email already exists']);
        }
    }




    // update user data to database
    public function updateUser(Request $request, $userId){
        // Find the user by id
        $user = Users::findOrFail($userId);

        // Filter the request data to remove null or empty values
        $userData = array_filter($request->all());

        // Fill user model
        $user->fill($userData);

        // Save user to database
        $user->save();

        return response()->json(['message' => 'User updated successfully']);
    }
}
