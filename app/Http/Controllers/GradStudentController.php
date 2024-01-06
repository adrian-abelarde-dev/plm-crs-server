<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Schedule;
use App\Models\ClassHours;
use App\Models\GradStudent;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use App\Models\AssessmentHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GradStudentController extends Controller
{
    //test function
    public function index($studNum){
        return $studNum . 'here';
    }

    // /grad-students/1/{studNum}
    public function getStudent($studNum)
    {
        $gradstudent = GradStudent::join('users', 'gradstudents.userId', '=', 'users.id')
            ->join('studentterms', 'gradstudents.studentID', '=', 'studentterms.studentID')
            ->where('gradstudents.studentId', '=', $studNum)
            ->get(['gradstudents.*', 'users.*', 'studentterms.*']);

        if ($gradstudent) {
            return response()->json([
                'status' => 200,
                'data' => $gradstudent
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
                'data' => $assessment
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
                'data' => $payments
            ], 200);
        } else {
            return 'Something went wrong';
        }
    }

    //enrollment.api post: /grad-enroll/{studNum}
    public function postGradEnroll(Request $request, $studNum)
    {
        $request->validate([
            'sectionName' => 'required',
            'subjectName' => 'required',
            'roomName' => 'required',
            'day' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'paymentMethod' => 'required',
        ]);

        $student = GradStudent::where('studentID', $studNum)->first();

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $sectionID = Section::where('sectionName', $request->input('sectionName'))->value('sectionID');
        $subjectID = Subject::where('subjectName', $request->input('subjectName'))->value('subjectID');
        $roomID = Room::where('roomName', $request->input('roomName'))->value('roomID');
        $classHoursID = ClassHours::where([
            'day' => $request->input('day'),
            'start' => $request->input('start'),
            'finish' => $request->input('finish'),
            'roomID' => $roomID,
        ])->value('classHoursID');
        $paymentHistoryID = PaymentHistory::where('studentID', $student->studentID)->value('paymentHistoryID');
        $scheduleID = Schedule::where([
            'sectionID' => $sectionID,
            'subjectID' => $subjectID,
            'roomID' => $roomID,
        ])->value('scheduleID');

        $student->update([
            'sectionID' => $sectionID,
            'subjectID' => $subjectID,
            'roomID' => $roomID,
            'classHoursID' => $classHoursID,
            'paymentHistoryID' => $paymentHistoryID,
            'scheduleID' => $scheduleID,
        ]);

        return response()->json(['message' => 'Student record updated successfully']);
    }

    //enrollment.api get: /grad-class/all
    public function getAllGradClass(){
        //Get all available grad classes 
        $schedules = Schedule::join('sections', 'schedules.sectionID', '=', 'sections.sectionID')
            ->join('subjects', 'schedules.subjectID', '=', 'subjects.subjectID')
            ->join('classHours', 'schedules.scheduleID', '=', 'classHours.scheduleID')
            ->join('rooms', 'schedules.roomID', '=', 'rooms.roomID')
            ->select('schedules.*', 'sections.*', 'subjects.*', 'classHours.*')
            ->get();

        if ($schedules) {
            return response()->json([
                'status' => 200,
                'data' => $schedules
            ], 200);
        } else {
            return 'Something went wrong';
        }
        
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
                'data' => $grades
            ], 200);
        } else {
            return 'Something went wrong';
        }
    }
}
