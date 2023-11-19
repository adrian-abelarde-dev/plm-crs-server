<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserType; // Assuming you have a UserType model

class UserTypeController extends Controller
{
    /**
     * Display a listing of all user types.
     */
    public function getAll()
    {
        $userTypes = UserType::all();
        return response()->json($userTypes);
    }

    /**
     * Display the specified user type.
     */
    public function getOne($userTypeId)
    {
        $userType = UserType::find($userTypeId);

        if (!$userType) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json($userType);
    }

    /**
     * Update the specified user type in storage.
     */
    public function updateOne(Request $request, $userTypeId)
    {
        $userType = UserType::find($userTypeId);

        if (!$userType) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        // Update logic here
        // $userType->update($request->all());

        return response()->json(['message' => 'Updated successfully']);
    }

    /**
     * Remove the specified user type from storage.
     */
    public function deleteOne($userTypeId)
    {
        $userType = UserType::find($userTypeId);

        if (!$userType) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $userType->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }

    /**
     * Store a newly created user type in storage.
     */
    public function createOne(Request $request)
    {
        // Validation and creation logic here
        // $userType = UserType::create($request->all());

        return response()->json(['message' => 'Created successfully'], 201);
    }
}
