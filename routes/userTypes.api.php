<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserTypeController;


// Get all user types
Route::get('/userType/all', [UserTypeController::class, 'getAll']);

// Get, delete, and update a single user type
Route::get('/userType/1/{userTypeId}', [UserTypeController::class, 'getUser']);
Route::delete('/userType/1/{userTypeId}', [UserTypeController::class, 'deleteUser']);
Route::put('/userType/1/{userTypeId}', [UserTypeController::class, 'updateUser']);

// Create a new user type
Route::post('/userType', [UserTypeController::class, 'createUser']);

