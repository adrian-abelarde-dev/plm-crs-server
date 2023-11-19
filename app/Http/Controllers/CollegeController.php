<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of all colleges.
     */
    public function getAll()
    {
        $colleges = College::all();
        return response()->json($colleges);
    }

    /**
     * Display the specified college.
     */
    public function getOne($collegeId)
    {
        $college = College::find($collegeId);

        if (!$college) {
            return response()->json(['message' => 'College not found'], 404);
        }

        return response()->json($college);
    }

    /**
     * Update the specified college in storage.
     */
    public function updateOne(Request $request, $collegeId)
    {
        $college = College::find($collegeId);

        if (!$college) {
            return response()->json(['message' => 'College not found'], 404);
        }

        $college->update($request->all());

        return response()->json(['message' => 'College updated']);
    }

    /**
     * Remove the specified college from storage.
     */
    public function deleteOne($collegeId)
    {
        $college = College::find($collegeId);

        if (!$college) {
            return response()->json(['message' => 'College not found'], 404);
        }

        $college->delete();

        return response()->json(['message' => 'College deleted']);
    }

    /**
     * Add a new college (this method name might be misleading as it's actually creating a new college).
     */
    public function addOne(Request $request, $collegeId)
    {
        $college = College::create($request->all());

        return response()->json($college, 201);
    }
}
