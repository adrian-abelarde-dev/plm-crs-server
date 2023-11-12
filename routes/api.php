<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get all activities
Route::get('/activities/all', [ActivityController::class, 'getAllActivities']);

// Get a specific activity
Route::get('/activities/{id}', [ActivityController::class, 'getActivityById']);

// Create a new activity
Route::post('/activities', [ActivityController::class, 'createActivity']);

// Update an existing activity
Route::put('/activities/{id}', [ActivityController::class, 'updateActivity']);
