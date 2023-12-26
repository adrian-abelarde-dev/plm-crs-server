<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Participant;



class ParticipantsController extends Controller
{
    public function getAllParticipants()
    {
        $participants = Participant::all();
        return response()->json(['participants' => $participants]);
    }

    public function createParticipant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'participantType' => 'required',
            'participants' => 'required',
            'participantName' => 'required',
            'aysem' => 'required',
            'dateRange' => 'required|json',
            'startTime' => 'required',
            'endTime' => 'required',
            'activityId' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $participant = Participant::create($request->all());

        return response()->json(['message' => 'Participant created successfully', 'participant' => $participant], 201);
    
    }
}
