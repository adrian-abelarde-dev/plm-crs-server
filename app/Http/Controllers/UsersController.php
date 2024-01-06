<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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
    public function insertUser(Request $request, $userId) {
        // Use $userId from route parameters
        $userData = [
            'id' => $userId,
            'firstName' => $request->input('firstName'),
            'middleName' => $request->input('middleName'),
            'lastName' => $request->input('lastName'),
            'plmEmail' => $request->input('plmEmail'),
        ];

        // Check if the userId already exists
        if (Users::where('id', $userData['id'])->exists()) {
            return response()->json(['message' => 'User with this userId already exists']);
        }

        // Check if the plmEmail already exists
        if (Users::where('plmEmail', $userData['plmEmail'])->exists()) {
            return response()->json(['message' => 'User with this email already exists']);
        }

        // Create a new User model instance
        $user = Users::create($userData);

        $userTypes = $request->input('userType');
        foreach ($userTypes as $userType) {
            // Create a new instance of the corresponding model for each userType
            $role = app("App\\Models\\{$userType}"); // Adjust the namespace based on your application

            // Set the fields to null if they are empty
            $roleData = [
                'userId' => $user->id,
                'tinNumber' => null,
                'gsisNumber' => null,
                'pedigree' => null,
                'instructorCode' => null,
                'onGraduate' => null,
            ];

            // Filter out null values before creating the record
            $roleData = array_filter($roleData, function ($value) {
                return $value !== null;
            });

            $role->create($roleData); // Adjust the column names based on your table structure
        }

        return response()->json(['message' => 'User inserted successfully']);
    }



    // update user data to database
    public function updateUser(Request $request, $userId)
    {
        // Validate the request data
        $request->validate([
            // Add validation rules for other user fields if needed
        ]);

        // Find the user by id
        $user = Users::findOrFail($userId);

        // Get the roles from the request
        $userTypes = $request->input('userType');

        // Use a database transaction for data consistency
        DB::beginTransaction();

        try {
            // Delete all instances of the specific userId from each role table
            foreach (["Student", "StudentGrad", "ChairpersonUndergrad", "ChairpersonGrad", "Faculty", "Admin"] as $userType) {
                $role = app("App\\Models\\{$userType}"); // Adjust the namespace based on your application
                $role->where('userId', $user->id)->delete(); // Adjust the column name based on your table structure
            }

            // Attach to the userType tables based on the updated userType
            foreach ($userTypes as $userType) {
                $role = app("App\\Models\\{$userType}"); // Adjust the namespace based on your application
                $role->create(['userId' => $user->id]); // Adjust the column name based on your table structure
            }

            // Filter the request data to remove null or empty values
            $userData = array_filter($request->only([
                'firstName',
                'middleName',
                'lastName',
                'plmEmail',
                // Add other user fields here
            ]));

            // Fill user model
            $user->fill($userData);

            // Save user to database
            $user->save();

            // Commit the transaction
            DB::commit();

            return response()->json(['message' => 'User updated successfully']);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollback();

            return response()->json(['message' => 'Error updating user'], 500);
        }
    }


}
