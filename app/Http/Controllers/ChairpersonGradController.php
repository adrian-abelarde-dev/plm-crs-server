<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentTerm;
use Illuminate\Support\Facades\DB;

class ChairpersonGradController extends Controller
{
    public function getAllGraduatingStudents()
    {
        // Find the largest aysem value
        $maxAysem = DB::table('student_terms')->max('aysem');

        // Retrieve all student terms with the largest aysem value along with user data
        $studentTerms = StudentTerm::join('users', 'student_terms.studentId', '=', 'users.id')
            ->select('student_terms.*', 'users.firstName', 'users.middleName', 'users.lastName', 'users.plmEmail', 'users.status')
            ->where('student_terms.aysem', $maxAysem)->where('student_terms.isGraduating', 1) //only grad students
            ->get();

        return response()->json(['students' => $studentTerms]);
    }

    public function searchGraduatingStudents($studentId)
    {
        // Find the largest aysem value
        $maxAysem = DB::table('student_terms')->max('aysem');

        // Retrieve all student terms with the largest aysem value along with user data
        $studentTerms = StudentTerm::join('users', 'student_terms.studentId', '=', 'users.id')
            ->select('student_terms.*', 'users.firstName', 'users.middleName', 'users.lastName', 'users.plmEmail', 'users.status')
            ->where('student_terms.aysem', $maxAysem)->where('student_terms.isGraduating', 1)->where('student_terms.studentId', $studentId)
            ->get();

        return response()->json(['students' => $studentTerms]);
    }

}
