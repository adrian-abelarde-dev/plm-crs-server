<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingTypeController;

// ? --> {PORT}/api/meeting-type/
Route::prefix('meeting-type')->group(function () {
	// Get all meeting types
	Route::get('/all', [MeetingTypeController::class, 'getAll']);

	// Get, update, and delete a single meeting type
	Route::get('/1/{meetingTypeId}', [MeetingTypeController::class, 'getOne']);
	Route::put('/1/{meetingTypeId}', [MeetingTypeController::class, 'updateOne']);
	Route::delete('/1/{meetingTypeId}', [MeetingTypeController::class, 'deleteOne']);

	// Create a new meeting type
	Route::post('/', [MeetingTypeController::class, 'createOne']);
});