<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\GradStudent;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use App\Models\AssessmentHistory;

class GradStudentController extends Controller
{
    // /grad-students/all
    public function index($studNum){

        return $studNum . 'here';
    }

    // /grad-students/1/{studNum}
    public function getStudent($studNum)
    {
        $student = GradStudent::select('students.*', 'users.*')
                ->join('users', 'students.userId', '=', 'users.id')
                ->where('students.studentId', $studNum)
                ->first();

        if ($student) {
            return response()->json([
                'status' => 200,
                'user' => $student
            ], 200);
        } else {
            return 'Something went wrong';
        }
    }

    // /grad-assessment-history/1/{studNum}
    public function getAssessment($studNum){

       $assessment = AssessmentHistory::where('studentID', $studNum)->get();

        if ($assessment) {
            return response()->json([
                'status' => 200,
                'user' => $assessment
            ], 200);
        } else {
            return 'Something went wrong';
        }
    }

    //Grad-payment-history GET: grad-payment-history/1/{studNum}
    public function getPayment($studNum){

        $payments = PaymentHistory::where('studentID', $studNum)->get();

        if ($payments) {
            return response()->json([
                'status' => 200,
                'user' => $payments
            ], 200);
        } else {
            return 'Something went wrong';
        }
    }

    //enrollment.api post: /grad-enroll/{studNum}
    public function postGradEnroll(Request $request, $studNum){

    }

    //enrollment.api get: /grad-class/all
    public function getAllGradClass(){
        //Get all available grad classes for enrollment
        //$classes = GradClass::all();
    }

    //grad-grades GET: grad-grades/all/{studNum}/{aysem}
    public function getAllGrades($studNum, $aysem)
    {
        $grades = Grade::join('studentterms', 'grades.studentTermID', '=', 'studentterms.studentTermID')
                ->where('studentterms.studentID', $studNum)
                ->where('studentterms.aysem', $aysem)
                ->get();

        if ($grades) {
            return response()->json([
                'status' => 200,
                'grades' => $grades
            ], 200);
        } else {
            return 'Something went wrong';
        }
    }
}
