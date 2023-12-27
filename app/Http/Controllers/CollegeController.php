<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CollegeController extends Controller
{
    /**
     * Display a listing of all colleges.
     */
    public function getAll()
    {
        // $colleges = College::all();
        // return response()->json($colleges);

        // Return hello message for testing
        return response()->json(['message' => 'getAll!']);
    }

    /**
     * Display the specified college.
     */
    public function getOne($collegeId)
    {
        // $college = College::find($collegeId);

        // if (!$college) {
        //     return response()->json(['message' => 'College not found'], 404);
        // }

        // return response()->json($college);

        // Return hello message for testing
        return response()->json(['message' => 'getOne!', 'collegeId' => $collegeId]);
    }

    /**
     * Update the specified college in storage.
     */
    public function updateOne(Request $request, $collegeId)
    {
        // $college = College::find($collegeId);

        // if (!$college) {
        //     return response()->json(['message' => 'College not found'], 404);
        // }

        // $college->update($request->all());

        // return response()->json(['message' => 'College updated']);

        // Return hello message for testing
        return response()->json(['message' => 'updateOne!', 'collegeId' => $collegeId]);
    }

    /**
     * Remove the specified college from storage.
     */
    public function deleteOne($collegeId)
    {
        // $college = College::find($collegeId);

        // if (!$college) {
        //     return response()->json(['message' => 'College not found'], 404);
        // }

        // $college->delete();

        // return response()->json(['message' => 'College deleted']);

        // Return hello message for testing
        return response()->json(['message' => 'deleteOne!', 'collegeId' => $collegeId]);
    }

    /**
     * Add a new college (this method name might be misleading as it's actually creating a new college).
     */
    public function addOne(Request $request, $collegeId)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'collegeName' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Check if a college with the specified collegeId already exists
        $existingCollege = College::find($collegeId);

        if ($existingCollege) {
            return response()->json(['error' => 'College with the specified collegeId already exists'], 409);
        }

        // Create the college with the user-defined collegeId
        $college = College::create([
            'collegeId' => $collegeId,
            'collegeName' => $request->input('collegeName'),
            'type' => $request->input('type'),
            'status' => $request->input('status'),
        ]);

        return response()->json(['message' => 'College added successfully', 'college' => $college], 201);
    }

}
