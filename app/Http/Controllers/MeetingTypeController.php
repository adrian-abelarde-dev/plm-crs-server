<?php

namespace App\Http\Controllers;

use App\Models\MeetingType;
use Illuminate\Http\Request;

class MeetingTypeController extends Controller
{
    /**
     * Display a listing of all meeting types.
     */
    public function getAll()
    {
        $meetingTypes = MeetingType::all();
        return response()->json($meetingTypes);
    }

    /**
     * Display the specified meeting type.
     */
    public function getOne($meetingTypeId)
    {
        $meetingType = MeetingType::find($meetingTypeId);

        if (!$meetingType) {
            return response()->json(['message' => 'Meeting type not found'], 404);
        }

        return response()->json($meetingType);
    }

    /**
     * Update the specified meeting type in storage.
     */
    public function updateOne(Request $request, $meetingTypeId)
    {
        $meetingType = MeetingType::find($meetingTypeId);

        if (!$meetingType) {
            return response()->json(['message' => 'Meeting type not found'], 404);
        }

        $meetingType->update($request->all());

        return response()->json(['message' => 'Meeting type updated']);
    }

    /**
     * Remove the specified meeting type from storage.
     */
    public function deleteOne($meetingTypeId)
    {
        $meetingType = MeetingType::find($meetingTypeId);

        if (!$meetingType) {
            return response()->json(['message' => 'Meeting type not found'], 404);
        }

        $meetingType->delete();

        return response()->json(['message' => 'Meeting type deleted']);
    }

    /**
     * Store a newly created meeting type in storage.
     */
    public function createOne(Request $request)
    {
        $meetingType = MeetingType::create($request->all());

        return response()->json($meetingType, 201);
    }
}
