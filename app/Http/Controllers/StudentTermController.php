<?php

namespace App\Http\Controllers;

use App\Models\StudentTerm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentTermController extends Controller
{
    public function getAllStudentTerms()
    {
        // Find the largest aysem value
        $maxAysem = DB::table('student_terms')->max('aysem');

        // Retrieve all student terms with the largest aysem value along with user data
        $studentTerms = StudentTerm::join('users', 'student_terms.studentId', '=', 'users.id')
            ->select('student_terms.*', 'users.firstName', 'users.middleName', 'users.lastName', 'users.plmEmail', 'users.status')
            ->where('student_terms.aysem', $maxAysem)
            ->get();

        return response()->json(['students' => $studentTerms]);
    }

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

    public function updateStudent(Request $request, $studentTermId)
    {
        // Validate the request data
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

        // Find the student term by id
        $studentTerm = StudentTerm::findOrFail($studentTermId);

        // Update the student term with the request data
        $studentTerm->update($request->all());

        return response()->json(['message' => 'Student updated successfully']);
    }
}
