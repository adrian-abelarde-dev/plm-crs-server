<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingTypeController;


// Get all meeting types
Route::get('/meetingType/all', [MeetingTypeController::class, 'getAll']);

// Get, update, and delete a single meeting type
Route::get('/meetingType/1/{meetingTypeId}', [MeetingTypeController::class, 'getOne']);
Route::put('/meetingType/1/{meetingTypeId}', [MeetingTypeController::class, 'updateOne']);
Route::delete('/meetingType/1/{meetingTypeId}', [MeetingTypeController::class, 'deleteOne']);

// Create a new meeting type
Route::post('/meetingType', [MeetingTypeController::class, 'createOne']);

