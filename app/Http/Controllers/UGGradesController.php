<?php

// app/Http/Controllers/UGGradesController.php

namespace App\Http\Controllers;

use App\Models\UgGrade;
use App\Models\StudentTerm;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


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

    // public function getStudentsOnStudentTerms($subjectId, $blockId)
    // {
    //     // Retrieve students from student_terms table based on the provided blockId
    //     $students = StudentTerm::where('blockId', $blockId)->get();

    //     // You can customize the response format as needed
    //     $formattedStudents = $students->map(function ($student) {
    //         return [
    //             'studentNumber' => $student->studentNumber,
    //             'studentName' => $student->fullName(),
    //             'program' => $student->program,
    //             'year' => $student->yearLevel,
    //             'finalGrade' => '',
    //             'remarks' => '',
    //             'subjectId' => $subjectId,
    //         ];
    //     });

    //     return response()->json(['students' => $formattedStudents]);
    // }

    // public function getStudentsOnGrades($subjectId, $blockId)
    // {
    //     // Retrieve students from ug_grades table based on the provided subjectId and blockId
    //     $students = UgGrade::where('subjectId', $subjectId)
    //         ->whereHas('studentTerm', function ($query) use ($blockId) {
    //             $query->where('blockId', $blockId);
    //         })
    //         ->get();

    //     // You can customize the response format as needed
    //     $formattedStudents = $students->map(function ($grade) {
    //         $student = $grade->studentTerm;

    //         return [
    //             'studentNumber' => $student->studentNumber,
    //             'studentName' => $student->fullName(),
    //             'program' => $student->program,
    //             'year' => $student->yearLevel,
    //             'finalGrade' => $grade->grade,
    //             'remarks' => $grade->remarks,
    //             'subjectId' => $grade->subjectId,
    //         ];
    //     });

    //     return response()->json(['students' => $formattedStudents]);
    // }
}
