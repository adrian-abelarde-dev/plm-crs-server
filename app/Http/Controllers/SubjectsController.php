<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subjects;
use Illuminate\Http\Request;


class SubjectsController extends Controller
{
    public function createUndergradSubject(Request $request, $subjectId)
    {
        // Validate the request data 
        $request->validate([
            'subjectName' => 'required|string',
            'updatedBy' => 'required|string',
            'status' => 'required|boolean'
        ]);

        // Create a new Subject
        $subject = new Subjects([
            'subjectId' => $subjectId,
            'subjectName' => $request->input('subjectName'),
            'subjectType' => 0, //0 undergrad, 1 grad
            'updatedBy' => $request->input('updatedBy'),
            'status' => $request->input('status')
        ]);

        $subject->save();

        return response()->json(['message' => 'Undergrad subject created successfully', 'data' => $subject]);
    }

    public function createGradSubject(Request $request, $subjectId)
    {
        // Validate the request data 
        $request->validate([
            'subjectName' => 'required|string',
            'updatedBy' => 'required|string',
            'status' => 'required|boolean'
        ]);

        // Create a new Subject
        $subject = new Subjects([
            'subjectId' => $subjectId,
            'subjectName' => $request->input('subjectName'),
            'subjectType' => 1, //0 undergrad, 1 grad
            'updatedBy' => $request->input('updatedBy'),
            'status' => $request->input('status')
        ]);

        $subject->save();

        return response()->json(['message' => 'Grad subject created successfully', 'data' => $subject]);
    }

    public function getAllUndergradSubject()
    {
        // Retrieve all subjects
        $subjects = Subjects::where('subjects.subjectType', 0)->get();
        return response()->json(['Undergraduate Subjects' => $subjects]);
    }

    public function getAllGradSubject()
    {
        // Retrieve all subjects
        $subjects = Subjects::where('subjects.subjectType', 1)->get();
        return response()->json(['Graduate Subjects' => $subjects]);
    }

    public function searchSubject($subjectId)
    {
        $subjects = Subjects::where('subjects.subjectId', $subjectId)->get();
        return response()->json(['Search Subject' => $subjects]);
    }

    public function updateSubject(Request $request, $subjectId)
    {
        // Validate the request data 
        $request->validate([
            'subjectName' => 'required|string',
            'subjectType' => 'required|integer', //if user wants to change subject to grad or undergrad
            'updatedBy' => 'required|string',
            'status' => 'required|boolean'
        ]);

        // Create a new Subject
        $subject = new Subjects([
            'subjectId' => $subjectId,
            'subjectName' => $request->input('subjectName'),
            'subjectType' => $request->input('subjectType'), //if user wants to change subject to grad or undergrad
            'updatedBy' => $request->input('updatedBy'),
            'status' => $request->input('status')
        ]);

        $subject->update($request->all());

        return response()->json(['message' => 'Subject updated successfully', 'data' => $subject]);
    }
}
