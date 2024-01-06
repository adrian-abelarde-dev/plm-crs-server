<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    // GET:  sections/all
    public function getAll(){
        //get sections, colleges, programs table 
        // where collegeType and programType = 1 
        $sections = Section::select('sections.*')
                    ->join('colleges', 'sections.collegeID', '=', 'colleges.collegeID')
                    ->join('programs', 'programs.collegeID', '=', 'colleges.collegeID')
                    ->where('colleges.collegeType', '=', 1)
                    ->where('programs.programType', '=', 1)
                    ->get();

        return response()->json(['sections' => $sections], 200);
    }

    // PUT:  /sections/1/{sectionID}
    public function updateOne(Request $request, $sectionID)
    {
        $request->validate([
            'sectionName' => 'required',
            'collegeID' => 'required',
            'programID' => 'required',
            'yearLevel' => 'required',
            'aysem' => 'required',
            'updatedBy' => 'required',
            'status' => 'required'
        ]);

        $section = Section::findOrFail($sectionID);

        $section->update([
            'yearLevel' => $request->input('yearLevel'),
            'collegeID' => $request->input('collegeID'),
            'programID' => $request->input('programID'),
            'aysem' => $request->input('aysem'),
            'updatedBy' => $request->input('updatedBy'),
            'sectionName' => $request->input('sectionName'),
            'status' => $request->input('status')
                
        ]);

        return response()->json(['message' => 'Section updated successfully', 'data' => $section]); 
    }

    // PUT:   sections/1/archive/{sectionID}
    public function updateArchived(Request $request, $sectionID)
    {
        $request->validate([
            'sectionName' => 'required',
            'collegeID' => 'required',
            'programID' => 'required',
            'yearLevel' => 'required',
            'aysem' => 'required',
            'updatedBy' => 'required',
            'status' => 'required'
        ]);

        // Find archived section
        $section = Section::where('sectionID', $sectionID)
            ->where('status', 0)
            ->firstOrFail();

        $section->update([
            'yearLevel' => $request->input('yearLevel'),
            'collegeID' => $request->input('collegeID'),
            'programID' => $request->input('programID'),
            'aysem' => $request->input('aysem'),
            'updatedBy' => $request->input('updatedBy'),
            'sectionName' => $request->input('sectionName'),
            'status' => $request->input('status')
        ]);

        return response()->json(['message' => 'Section updated successfully', 'data' => $section]);
    }

    // POST:   sections/1/{sectionID}
    public function createOne(Request $request, $sectionID)
    {
        $request->validate([
            'yearLevel' => 'required',
            'collegeID' => 'required',
            'programID' => 'required',
            'aysem' => 'required',
            'updatedBy' => 'required',
            'sectionName' => 'required',
            'status' => 'required'
        ]);

        $section = Section::create([
            'yearLevel' => $request->input('yearLevel'),
            'sectionID' => $sectionID,
            'collegeID' => $request->input('collegeID'),
            'programID' => $request->input('programID'),
            'aysem' => $request->input('aysem'),
            'updatedBy' => $request->input('updatedBy'),
            'sectionName' => $request->input('sectionName'),
            'status' => $request->input('status')
        ]);

        return response()->json([
            'message' => "Section created successfully",
            'data' => $section
        ], 201);
    }
}
