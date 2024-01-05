<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function createOne(Request $request, $facultyId, $aysem)
    {
        // Validate the request data
        $request->validate([
            'courseCode' => 'required|string',
            'section' => 'required|string',
            'courseTitle' => 'required|string',
            'units' => 'required|integer',
            'classSchedule' => 'required|string',
            'studentCount' => 'required|integer',
            'creditedUnits' => 'required|integer',
            'college' => 'required|string',
            'loadType' => 'required|string',
            'facultyId' => 'required',
            // Remove the validation for aysem from here
        ]);

        // Create a new class instance
        $class = Classes::create(array_merge($request->all(), ['facultyId' => $facultyId, 'aysem' => $aysem]));

        return response()->json(['message' => 'Class created successfully', 'data' => $class], 201);
    }


    public function getAll($facultyId, $aysem)
    {
        // Validate the request data
        // No need to validate facultyId and aysem here since they are part of the URL parameters

        // Retrieve all classes based on facultyId and aysem
        $classes = Classes::where('facultyId', $facultyId)
            ->where('aysem', $aysem)
            ->get();

        return response()->json(['data' => $classes]);
    }


    public function getAllCourseCode($facultyId, $aysem, $courseCode)
{
    // Validate the request data
    // No need to validate facultyId, aysem, and courseCode here since they are part of the URL parameters

    // Retrieve all classes based on facultyId, aysem, and courseCode
    $classes = Classes::where('facultyId', $facultyId)
        ->where('aysem', $aysem)
        ->where('courseCode', $courseCode)
        ->get();

    return response()->json(['data' => $classes]);
}

}
