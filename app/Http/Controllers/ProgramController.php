<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProgramController extends Controller
{
    /**
     * Display a listing of all programs.
     */
    public function getAll()
    {
        // $programs = Program::all();
        // return response()->json($programs);

        // Return hello message for testing
        return response()->json(['message' => 'getAll!']);
    }

    /**
     * Display a listing of programs by college.
     */
    public function getByCollege($collegeId)
    {
        // $programs = Program::where('college_id', $collegeId)->get();

        // if ($programs->isEmpty()) {
        //     return response()->json(['message' => 'No programs found for the specified college'], 404);
        // }

        // return response()->json($programs);

        // Return hello message for testing
        return response()->json(['message' => 'getByCollege!', 'collegeId' => $collegeId]);
    }

    /**
     * Display the specified program.
     */
    public function getOne($programId)
    {
        // $program = Program::find($programId);

        // if (!$program) {
        //     return response()->json(['message' => 'Program not found'], 404);
        // }

        // return response()->json($program);

        // Return hello message for testing
        return response()->json(['message' => 'getOne!', 'programId' => $programId]);
    }

    /**
     * Update the specified program in storage.
     */
    public function updateOne(Request $request, $programId)
    {
        // $program = Program::find($programId);

        // if (!$program) {
        //     return response()->json(['message' => 'Program not found'], 404);
        // }

        // $program->update($request->all());

        // return response()->json(['message' => 'Program updated']);

        // Return hello message for testing
        return response()->json(['message' => 'updateOne!', 'programId' => $programId]);
    }

    /**
     * Remove the specified program from storage.
     */
    public function deleteOne($programId)
    {
        // $program = Program::find($programId);

        // if (!$program) {
        //     return response()->json(['message' => 'Program not found'], 404);
        // }

        // $program->delete();

        // return response()->json(['message' => 'Program deleted']);

        // Return hello message for testing
        return response()->json(['message' => 'deleteOne!', 'programId' => $programId]);
    }

    /**
     * Add a new program (note: this method's purpose might be misleading as it's actually creating a new program).
     */
    public function addOne(Request $request, $programId)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'collegeId' => 'required|string',
            'programName' => 'required|string',
            'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        // Check if the program with the given programId already exists
        if (Program::find($programId)) {
            return response()->json(['error' => 'Program with the same programId already exists.'], 422);
        }

        // Create a new program with the provided programId
        $programData = array_merge($request->all(), ['programId' => $programId]);
        $program = Program::create($programData);

        return response()->json(['message' => 'Program added successfully', 'program' => $program]);
    }

    public function toggleStatus($programId)
    {
        // Find the program by programId
        $program = Program::find($programId);

        if (!$program) {
            return response()->json(['message' => 'Program not found'], 404);
        }

        // Toggle the status
        $program->status = ($program->status === 'Active') ? 'Inactive' : 'Active';

        // Save the changes
        $program->save();

        return response()->json(['message' => 'Status toggled successfully', 'program' => $program]);
    }
}
