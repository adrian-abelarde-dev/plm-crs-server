<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;
use Illuminate\Support\Facades\Validator;

class ActivitiesController extends Controller
{
    public function getAllActivities()
    {
        // $activities = Activity::all();
        // return response()->json($activities);

        // Return hello message for testing
        return response()->json(['message' => 'getAllActivities!']);
    }

    public function getActivityById($id)
    {
        // $activity = Activity::find($id);

        // if (!$activity) {
        //     return response()->json(['error' => 'Activity not found'], 404);
        // }

        // return response()->json($activity);

        // Return hello message for testing
        return response()->json(['message' => 'getActivityById!', 'id' => $id]);
    }

    public function createActivity(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'activityName' => 'required',
            'aysem' => 'required',
            'dateRange' => 'required|json',
            'startTime' => 'required',
            'endTime' => 'required',
            'status' => 'required',
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Create a new activity
        $activity = Activities::create([
            'activityName' => $request->input('activityName'),
            'aysem' => $request->input('aysem'),
            'dateRange' => $request->input('dateRange'), // Decode JSON to an array
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
            'status' => $request->input('status'),
        ]);

        return response()->json(['message' => 'Activity created successfully', 'activity' => $activity], 201);
    }

    public function updateActivity(Request $request, $id)
    {
        // $activity = Activity::find($id);

        // if (!$activity) {
        //     return response()->json(['error' => 'Activity not found'], 404);
        // }

        // // Validate and update the activity
        // // Example validation
        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     // Add other fields as needed
        // ]);

        // $activity->update($validatedData);

        // return response()->json($activity);

        // Return hello message for testing
        return response()->json(['message' => 'getActivityById!', 'id' => $id]);
    }
}