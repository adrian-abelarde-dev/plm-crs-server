<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\MeetingTypeController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\EmailBlastController;


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



// Get all user types
Route::get('/userType/all', [UserTypeController::class, 'getAll']);

// Get, delete, and update a single user type
Route::get('/userType/1/{userTypeId}', [UserTypeController::class, 'getUser']);
Route::delete('/userType/1/{userTypeId}', [UserTypeController::class, 'deleteUser']);
Route::put('/userType/1/{userTypeId}', [UserTypeController::class, 'updateUser']);

// Create a new user type
Route::post('/userType', [UserTypeController::class, 'createUser']);



// Get all meeting types
Route::get('/meetingType/all', [MeetingTypeController::class, 'getAll']);

// Get, update, and delete a single meeting type
Route::get('/meetingType/1/{meetingTypeId}', [MeetingTypeController::class, 'getOne']);
Route::put('/meetingType/1/{meetingTypeId}', [MeetingTypeController::class, 'updateOne']);
Route::delete('/meetingType/1/{meetingTypeId}', [MeetingTypeController::class, 'deleteOne']);

// Create a new meeting type
Route::post('/meetingType', [MeetingTypeController::class, 'createOne']);


// Get all blocks
Route::get('/blocks/all', [BlockController::class, 'getAll']);

// Get, update, and delete a single block
Route::get('/blocks/1/{blockId}', [BlockController::class, 'getOne']);
Route::put('/blocks/1/{blockId}', [BlockController::class, 'updateOne']);
Route::delete('/blocks/1/{blockId}', [BlockController::class, 'deleteOne']);

// Create a new block
Route::post('/blocks', [BlockController::class, 'createOne']);



// Get all colleges
Route::get('/colleges/all', [CollegeController::class, 'getAll']);

// Operations on a single college
Route::get('/colleges/1/{collegeId}', [CollegeController::class, 'getOne']);
Route::put('/colleges/1/{collegeId}', [CollegeController::class, 'updateOne']);
Route::delete('/colleges/1/{collegeId}', [CollegeController::class, 'deleteOne']);
Route::post('/colleges/1/{collegeId}', [CollegeController::class, 'addOne']);


// Get all programs
Route::get('/programs/all', [ProgramController::class, 'getAll']);

// Get all programs by college
Route::get('/programs/byCollege/{collegeId}', [ProgramController::class, 'getByCollege']);

// Operations on a single program
Route::get('/programs/1/{programId}', [ProgramController::class, 'getOne']);
Route::put('/programs/1/{programId}', [ProgramController::class, 'updateOne']);
Route::delete('/programs/1/{programId}', [ProgramController::class, 'deleteOne']);
Route::post('/programs/1/{programId}', [ProgramController::class, 'addOne']);


// POST route for sending email credentials
Route::post('/emailBlast', [EmailBlastController::class, 'sendCredentials']);
