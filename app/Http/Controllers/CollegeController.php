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
        $colleges = College::withCount('programs')->get();

        // Add the 'programsListed' count to each college in the response
        $collegesWithProgramsListed = $colleges->map(function ($college) {
            return [
                'collegeId' => $college->collegeId,
                'collegeName' => $college->collegeName,
                'type' => $college->type,
                'status' => $college->status,
                'programsListed' => $college->programs_count,
            ];
        });

        return response()->json($collegesWithProgramsListed);
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

    public function toggleStatus($collegeId)
    {
        // Find the college by collegeId
        $college = College::find($collegeId);

        if (!$college) {
            return response()->json(['message' => 'College not found'], 404);
        }

        // Toggle the status
        $college->status = ($college->status === 'Active') ? 'Inactive' : 'Active';

        // Save the changes
        $college->save();

        return response()->json(['message' => 'Status toggled successfully', 'college' => $college]);
    }

}
