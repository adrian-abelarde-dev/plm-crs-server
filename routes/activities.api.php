<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

// ? --> {PORT}/api/activities/
Route::prefix('activities')->group(function () {
	// get all activities
    Route::get('/all', [ActivityController::class, 'getAllActivities']);

	// get a specific activity
    Route::get('/1/{id}', [ActivityController::class, 'getActivityById']);

	// create a new activity
    Route::post('/', [ActivityController::class, 'createActivity']);

	// update an existing activity
    Route::put('/1/{id}', [ActivityController::class, 'updateActivity']);
});