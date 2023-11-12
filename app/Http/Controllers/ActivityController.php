<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function getAllActivities()
    {
        $activities = Activity::all();
        return response()->json($activities);
    }

    public function getActivityById($id)
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return response()->json(['error' => 'Activity not found'], 404);
        }

        return response()->json($activity);
    }

    public function createActivity(Request $request)
    {
        // Validate and store the new activity
        // Example validation
        $validatedData = $request->validate([
            'name' => 'required|string',
            // Add other fields as needed
        ]);

        $activity = Activity::create($validatedData);

        return response()->json($activity, 201);
    }

    public function updateActivity(Request $request, $id)
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return response()->json(['error' => 'Activity not found'], 404);
        }

        // Validate and update the activity
        // Example validation
        $validatedData = $request->validate([
            'name' => 'required|string',
            // Add other fields as needed
        ]);

        $activity->update($validatedData);

        return response()->json($activity);
    }
}