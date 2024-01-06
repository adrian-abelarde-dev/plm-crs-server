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
        $programs = Program::all();
        return response()->json($programs);
    }

    // Get by college
    public function getByCollege($collegeId)
    {
        $programs = Program::where('collegeId', $collegeId)->get();

        // Add the 'studentEnlisted' static value to each program in the response
        $programsWithStudentEnlisted = $programs->map(function ($program) {
            return [
                'programId' => $program->programId,
                'programName' => $program->programName,
                'status' => $program->status,
                'studentEnlisted' => 0, // Static value for illustration
                'created_at' => $program->created_at,
                'updated_at' => $program->updated_at,
            ];
        });

        return response()->json($programsWithStudentEnlisted);
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
