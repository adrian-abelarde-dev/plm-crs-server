<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
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
        return response()->json(['message' => 'getActivityById!']);
    }

    public function createActivity(Request $request)
    {
        // // Validate and store the new activity
        // // Example validation
        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     // Add other fields as needed
        // ]);

        // $activity = Activity::create($validatedData);

        // return response()->json($activity, 201);

        // Return hello message for testing
        return response()->json(['message' => 'createActivity!']);
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
        return response()->json(['message' => 'updateActivity!']);
    }
}