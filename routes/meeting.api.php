<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;

// ? --> {PORT}/api/meeting/
Route::prefix('meeting')->group(function () {
	// Get all meeting
	Route::get('/all', [MeetingController::class, 'getAll']);

	// Get 1 meeting by id
	Route::post('/1/{meetingId}', [MeetingController::class, 'createOne']);

	// Toggle status of a meeting by id; 'Active' and 'Inactive' are the only 2 statuses
	Route::put('/toggle-status/{meetingId}', [MeetingController::class, 'toggleStatus']);
});