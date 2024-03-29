<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meeting;
use Illuminate\Support\Facades\Validator;


class MeetingController extends Controller
{

    public function getAll()
    {
        // Retrieve all meetings from the database
        $meetings = Meeting::all();

        return response()->json(['data' => $meetings]);
    }
    
    public function createOne(Request $request, $meetingId)
    {
        // Check if a meeting with the given meetingId already exists
        $existingMeeting = Meeting::find($meetingId);

        if ($existingMeeting) {
            return response()->json(['message' => 'Meeting with this meetingId already exists'], 422);
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'label' => 'required|string',
            'meetingType' => 'required|string',
            'college' => 'required|string',
            'status' => 'required|string',
        ]);

        // If validation fails, return the validation errors
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create a new meeting instance with the provided meetingId
        $meeting = Meeting::create(array_merge($request->all(), ['meetingId' => $meetingId]));

        return response()->json(['message' => 'Meeting created successfully', 'data' => $meeting], 201);
    }

    public function toggleStatus($meetingId)
    {
        // Find the meeting by meetingId
        $meeting = Meeting::find($meetingId);

        // Check if the meeting exists
        if (!$meeting) {
            return response()->json(['message' => 'Meeting not found'], 404);
        }

        // Toggle the status
        $meeting->status = $meeting->status === 'Active' ? 'Inactive' : 'Active';

        // Save the updated status to the database
        $meeting->save();

        return response()->json(['message' => 'Status toggled successfully', 'data' => $meeting]);
    }


}
