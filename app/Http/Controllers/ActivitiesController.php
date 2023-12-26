<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;
use Illuminate\Support\Facades\Validator;

class ActivitiesController extends Controller
{
    public function getAllActivities()
    {
        $activities = Activities::all();

        return response()->json(['activities' => $activities]);
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

        // Find the activity by its ID
        $activity = Activities::find($id);

        // If the activity doesn't exist, return a not found response
        if (!$activity) {
            return response()->json(['message' => 'Activity not found'], 404);
        }

        // Update the activity with the new data
        $activity->update([
            'activityName' => $request->input('activityName'),
            'aysem' => $request->input('aysem'),
            'dateRange' => $request->input('dateRange'),
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
            'status' => $request->input('status'),
        ]);

        return response()->json(['message' => 'Activity updated successfully', 'activity' => $activity]);
    }
}