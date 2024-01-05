<?php

// app/Http/Controllers/UGGradesController.php

namespace App\Http\Controllers;

use App\Models\UgGrade;
use App\Models\StudentTerm;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UGGradesController extends Controller
{
    public function insertGrades(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'subjectId' => 'required|string',
            'studentId' => [
                'required',
                Rule::unique('ug_grades')->where(function ($query) use ($request) {
                    return $query->where('subjectId', $request->input('subjectId'))
                        ->where('studentId', $request->input('studentId'));
                }),
            ],
            'facultyId' => 'required',
            'blockId' => 'required|string',
            'grade' => 'required|string',
            'aysem' => 'required|string',
            'remarks' => 'nullable|string',
        ], [
            'studentId.unique' => 'A grade for this subject and student already exists.',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Create a new UgGrade instance
        $grade = UgGrade::create($request->all());

        return response()->json(['message' => 'Grade inserted successfully', 'data' => $grade], 201);
    }

    public function getStudentsOnStudentTerms($subjectId, $blockId)
    {
        // Retrieve students from student_terms table based on the provided blockId
        $students = DB::table('student_terms')
            ->join('users', 'student_terms.studentId', '=', 'users.id')
            ->select('users.id', 'users.firstName', 'users.middleName', 'users.lastName', 'student_terms.programId', 'student_terms.yearLevel')
            ->where('student_terms.blockId', $blockId)
            ->get();

        // You can customize the response format as needed
        $formattedStudents = $students->map(function ($student) use ($subjectId) {
            return [
                'studentNumber' => $student->id,
                'studentName' => $student->firstName . ' ' . $student->lastName,
                'program' => $student->programId, // Adjust this based on your actual column name
                'year' => $student->yearLevel,
                'finalGrade' => '',
                'remarks' => '',
                'subjectId' => $subjectId,
            ];
        });

        return response()->json(['students' => $formattedStudents]);
    }

    public function getStudentsOnGrades($subjectId, $blockId)
    {
        // Retrieve students from ug_grades table based on the provided subjectId and blockId
        $students = DB::table('ug_grades')
            ->join('student_terms', 'ug_grades.studentId', '=', 'student_terms.studentId')
            ->join('users', 'student_terms.studentId', '=', 'users.id')
            ->select(
                'users.id as studentNumber',
                'users.firstName',
                'users.lastName',
                'student_terms.programId',
                'student_terms.yearLevel',
                'ug_grades.grade',
                'ug_grades.remarks',
                'ug_grades.subjectId'
            )
            ->where('ug_grades.subjectId', $subjectId)
            ->where('student_terms.blockId', $blockId)
            ->get();

        // You can customize the response format as needed
        $formattedStudents = $students->map(function ($student) {
            return [
                'studentNumber' => $student->studentNumber,
                'studentName' => $student->firstName . ' ' . $student->lastName,
                'program' => $student->programId, // Adjust this based on your actual column name
                'year' => $student->yearLevel,
                'finalGrade' => $student->grade,
                'remarks' => $student->remarks,
                'subjectId' => $student->subjectId,
            ];
        });

        return response()->json(['students' => $formattedStudents]);
    }
}
