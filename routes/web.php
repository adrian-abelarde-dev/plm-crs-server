<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// // Get all activities
// Route::get('/activities/all', [ActivityController::class, 'getAllActivities']);

// // Get a specific activity
// Route::get('/activities/{id}', [ActivityController::class, 'getActivityById']);

// // Create a new activity
// Route::post('/activities', [ActivityController::class, 'createActivity']);

// // Update an existing activity
// Route::put('/activities/{id}', [ActivityController::class, 'updateActivity']);

// // Get all user types
// Route::get('/userType/all', [UserTypeController::class, 'getAll']);

// // Get, delete, and update a single user type
// Route::get('/userType/1/{userTypeId}', [UserTypeController::class, 'getOne']);
// Route::delete('/userType/1/{userTypeId}', [UserTypeController::class, 'deleteOne']);
// Route::put('/userType/1/{userTypeId}', [UserTypeController::class, 'updateOne']);

// // Create a new user type
// Route::post('/userType', [UserTypeController::class, 'createOne']);