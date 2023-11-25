<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

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
        return response()->json(['message' => 'getByCollege!']);
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
        return response()->json(['message' => 'getOne!']);
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
        return response()->json(['message' => 'updateOne!']);
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
        return response()->json(['message' => 'deleteOne!']);
    }

    /**
     * Add a new program (note: this method's purpose might be misleading as it's actually creating a new program).
     */
    public function addOne(Request $request, $programId)
    {
        // $program = Program::create($request->all());

        // return response()->json($program, 201);

        // Return hello message for testing
        return response()->json(['message' => 'addOne!']);
    }
}
