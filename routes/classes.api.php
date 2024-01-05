<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassesController;

// ? --> {PORT}/api/class/
Route::prefix('class')->group(function () {
	// Get all classes by faculty and aysem
	Route::get('/all/{facultyId}/{aysem}/all-course', [ClassesController::class, 'getAll']);

	// Get all classe by faculty, aysem, and courseCode
	Route::get('/all/{facultyId}/{aysem}/course/{courseCode}', [ClassesController::class, 'getAllCourseCode']);

	// Create 1 class by faculty and aysem
	Route::post('/1/{facultyId}/{aysem}', [ClassesController::class, 'createOne']);
});