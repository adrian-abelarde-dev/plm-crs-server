<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;

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
});