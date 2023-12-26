<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ParticipantsController;

// ? --> {PORT}/api/activities/
Route::prefix('activities')->group(function () {
	// get all activities
    Route::get('/all', [ActivitiesController::class, 'getAllActivities']);

	// get a specific activity
    Route::get('/1/{id}', [ActivitiesController::class, 'getActivityById']);

	// create a new activity
    Route::post('/1', [ActivitiesController::class, 'createActivity']);

	// update an existing activity
    Route::put('/1/{id}', [ActivitiesController::class, 'updateActivity']);

	// delete an existing activity
	Route::delete('/1/{id}', [ActivitiesController::class, 'deleteActivity']);
});

// ? --> {PORT}/api/participants/
Route::prefix('participants')->group(function () {
	// get all participants
	Route::get('/all', [ParticipantsController::class, 'getAllParticipants']);

	// create a new participant
	Route::post('/1', [ParticipantsController::class, 'createParticipant']);
});