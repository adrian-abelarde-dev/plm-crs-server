<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserTypeController;




// ? --> {PORT}/api/user-type/
Route::prefix('user-type')->group(function () {
	// Get all user types
	Route::get('/all', [UserTypeController::class, 'getAll']);

	// Get, delete, and update a single user type
	Route::get('/1/{userTypeId}', [UserTypeController::class, 'getUser']);
	Route::delete('/1/{userTypeId}', [UserTypeController::class, 'deleteUser']);
	Route::put('/1/{userTypeId}', [UserTypeController::class, 'updateUser']);

	// Create a new user type
	Route::post('/', [UserTypeController::class, 'createUser']);
});