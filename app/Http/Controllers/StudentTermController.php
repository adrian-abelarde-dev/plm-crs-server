<?php

namespace App\Http\Controllers;

use App\Models\StudentTerm;
use Illuminate\Http\Request;

class StudentTermController extends Controller
{
    // Other controller methods...

    public function insertStudent(Request $request, $studentId)
    {
        // Validate the request data (customize these rules based on your requirements)
        $request->validate([
            'programId' => 'required',
            'collegeId' => 'required',
            'blockId' => 'required',
            'yearLevel' => 'required|integer',
            'studentStatus' => 'required',
            'studentType' => 'required',
            'aysem' => 'required',
            'isEnrolled' => 'required|boolean',
            'scholasticStatus' => 'required',
            'isGraduating' => 'required|boolean',
        ]);

        // Create a new StudentTerm model instance
        $studentTerm = new StudentTerm([
            'studentId' => $studentId,
            'programId' => $request->input('programId'),
            'collegeId' => $request->input('collegeId'),
            'blockId' => $request->input('blockId'),
            'yearLevel' => $request->input('yearLevel'),
            'studentStatus' => $request->input('studentStatus'),
            'studentType' => $request->input('studentType'),
            'aysem' => $request->input('aysem'),
            'isEnrolled' => $request->input('isEnrolled'),
            'scholasticStatus' => $request->input('scholasticStatus'),
            'isGraduating' => $request->input('isGraduating'),
        ]);

        // Save the student term to the database
        $studentTerm->save();

        return response()->json(['message' => 'Student inserted successfully']);
    }

    // Other controller methods...
}
