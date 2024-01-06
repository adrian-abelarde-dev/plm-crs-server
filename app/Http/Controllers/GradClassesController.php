<?php

namespace App\Http\Controllers;

use App\Models\GradClasses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class GradClassesController extends Controller
{
    public function createOne(Request $request, $facultyId, $aysem)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'courseCode' => [
                'required',
                'string',
            ],
            'section' => [
                'required',
                'string',
            ],
            'courseTitle' => 'required|string',
            'units' => 'required|integer',
            'classSchedule' => 'required|string',
            'studentCount' => 'required|integer',
            'creditedUnits' => 'required|integer',
            'college' => 'required|string',
            'loadType' => 'required|string',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Create a new class instance
        $class = GradClasses::create(array_merge($request->all(), ['facultyId' => $facultyId, 'aysem' => $aysem]));

        return response()->json(['message' => 'Class created successfully', 'data' => $class], 201);
    }

    public function getAll($facultyId, $aysem)
    {
        // Validate the request data
        // No need to validate facultyId and aysem here since they are part of the URL parameters

        // Retrieve all classes based on facultyId and aysem
        $classes = GradClasses::where('facultyId', $facultyId)
            ->where('aysem', $aysem)
            ->get();

        return response()->json(['data' => $classes]);
    }


    public function getAllCourseCode($facultyId, $aysem, $courseCode)
    {
        // Retrieve all classes based on facultyId, aysem, and courseCode
        $classes = GradClasses::where('facultyId', $facultyId)
            ->where('aysem', $aysem)
            ->where('courseCode', $courseCode)
            ->get();

        return response()->json(['data' => $classes]);
    }

    public function getByClassId($classId)
    {
        // Retrieve all by matching classId
        $classes = GradClasses::where('id', $classId)->get();

        return response()->json(['data' => $classes]);
    }

    public function getAysems($limit)
    {
        $currentYear = date('Y');

        $aysems = [];
        for ($i = 0; $i < $limit; $i++) {
            $year = $currentYear - floor($i / 2);
            $semester = $i % 2 == 0 ? '2' : '1';
            $aysem = $year . $semester;
            $aysems[] = $aysem;
        }

        return response()->json(['data' => $aysems]);
    }

    public function updateClass(Request $request, $classId)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'courseCode' => [
                'required',
                'string',
            ],
            'section' => [
                'required',
                'string',
            ],
            'courseTitle' => 'required|string',
            'units' => 'required|integer',
            'classSchedule' => 'required|string',
            'studentCount' => 'required|integer',
            'creditedUnits' => 'required|integer',
            'college' => 'required|string',
            'loadType' => 'required|string',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Find the faculty by id
        $find = GradClasses::findOrFail($classId);

        // Update faculty data
        $find->update($request->all());

        return response()->json(['message' => 'Class updated successfully', 'data' => $find], 201);
    }

}
