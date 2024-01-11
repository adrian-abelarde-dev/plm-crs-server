<?php

namespace App\Http\Controllers;

use App\Models\GradCurriculums;
use App\Models\GradClasses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class GradCurriculumsController extends Controller
{
    public function createCurriculum(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'curriculumCode' => 'required|string|unique:grad_curriculums,curriculumCode',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Create a new curriculum 
        $curriculum = GradCurriculums::create($request->all());

        return response()->json(['message' => 'Curriculum created successfully', 'data' => $curriculum], 201);
    }

    public function getAllCurriculums()
    {
        // Retrieve all curriculums
        $curriculums = GradCurriculums::with('curriculums_class_relationship')->get();
        return response()->json(['data' => $curriculums]);
    }

    public function getOneCurriculum($curriculumId)
    {
        // Retrieve all curriculums with that Id
        $curriculums = GradCurriculums::where('id', $curriculumId)->with('curriculums_class_relationship')->get();
        return response()->json(['data' => $curriculums]);
    }

    public function putClassInCurriculum($curriculumId, $courseId)
    {
        // Check if curriculumId exists
        $curriculum = GradCurriculums::find($curriculumId);
        if (!$curriculum) {
            return response()->json(['message' => 'Curriculum not found'], 404);
        }

        // Check if courseId exists
        $course = GradClasses::find($courseId);
        if (!$course) {
            return response()->json(['message' => 'Grad class not found'], 404);
        }

        // Check if the curriculumId and courseId pair already exists
        $existingPair = $curriculum->curriculums_class_relationship()
            ->where('curriculumId', $curriculumId)
            ->where('courseId', $courseId)
            ->exists();

        if ($existingPair) {
            return response()->json(['message' => 'This course is already in the curriculum'], 422);
        }

        // Attach the courseId to the curriculumId found in the check a while ago
        $curriculum->curriculums_class_relationship()->attach($courseId);

        // ONLY For display
        $show = GradCurriculums::where('id', $curriculumId)->with('curriculums_class_relationship')->get();

        return response()->json(['message' => 'Course inserted successfully', 'data' => $show], 201);
    }

    public function deleteCurriculum($curriculumId)
    {
        // Find the curriculum by its Id
        $curriculum = GradCurriculums::find($curriculumId);

        // Check if the curriculum exists
        if ($curriculum) {
            // Delete the curriculum
            $curriculum->delete();

            // Return a response
            return response()->json(['message' => 'Curriculum deleted successfully']);
        } else {
            // Return an error response if the curriculum does not exist
            return response()->json(['message' => 'Curriculum not found'], 404);
        }
    }
}
