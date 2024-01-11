<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Users;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function getAllFaculty()
    {
        // Retrieve all faculty members
        $faculty = Faculty::get();

        return response()->json(['Faculty' => $faculty]);
    }

    public function searchFaculty($facultyId)
    {
        // Retrieve all faculty members
        $faculty = Faculty::where('faculties.id', $facultyId)->get();

        return response()->json(['Faculty' => $faculty]);
    }

    public function insertFaculty(Request $request, $userId, $facultyId)
    {
        //check if userId exists
        if (Users::where('id', $userId)->exists()) {
            // Validate the request data (customize these rules based on your requirements)
            $request->validate([
                'tinNumber' => 'required',
                'gsisNumber' => 'required',
                'pedigree' => 'required',
                'instructorCode' => 'required',
                'onGraduate' => 'required|boolean',
            ]);

            // Create a new Faculty member
            $faculty = new Faculty([
                'id' => $facultyId,
                'userId' => $userId,
                'tinNumber' => $request->input('tinNumber'),
                'gsisNumber' => $request->input('gsisNumber'),
                'pedigree' => $request->input('pedigree'),
                'instructorCode' => $request->input('instructorCode'),
                'onGraduate' => $request->input('onGraduate')
            ]);

            $faculty->save();

            return response()->json(['message' => 'Faculty member inserted successfully']);
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }

    public function updateFaculty(Request $request, $facultyId)
    {
        // Validate the request data
        $request->validate([
            'tinNumber' => 'required',
            'gsisNumber' => 'required',
            'pedigree' => 'required',
            'instructorCode' => 'required',
            'onGraduate' => 'required|boolean',
        ]);

        // Find the faculty by id
        $find = Faculty::findOrFail($facultyId);

        // Update faculty data
        $find->update($request->all());

        return response()->json(['message' => 'Faculty member updated successfully']);
    }

    //TeachingAssignments
    public function getTeachingAssignment($facultyId)
    {
        $faculty = Faculty::find($facultyId);

        if ($faculty) {
            $classes = $faculty->classes;
            return response()->json(['teachingAssignments' => $classes]);
        } else {
            return response()->json(['Faculty not found']);
        }

    }
}
