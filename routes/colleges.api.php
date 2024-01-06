<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;

// ? --> {PORT}/api/colleges/
Route::prefix('colleges')->group(function () {
	// Get all colleges
	Route::get('/all', [CollegeController::class, 'getAll']);

	// Operations on a single college
	Route::post('/1/{collegeId}', [CollegeController::class, 'addOne']);

	// toggle status
	Route::put('/toggle-status/{collegeId}', [CollegeController::class, 'toggleStatus']);

});