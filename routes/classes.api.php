<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassesController;
use Illuminate\Support\Carbon;


// ? --> {PORT}/api/class/
Route::prefix('class')->group(function () {
	// Get all classes by faculty and aysem
	Route::get('/all/{facultyId}/{aysem}/all-course', [ClassesController::class, 'getAll']);

	// Get all classe by faculty, aysem, and courseCode
	Route::get('/all/{facultyId}/{aysem}/course/{courseCode}', [ClassesController::class, 'getAllCourseCode']);

	// Create 1 class by faculty and aysem
	Route::post('/1/{facultyId}/{aysem}', [ClassesController::class, 'createOne']);
});

// ? --> {PORT}/api/aysem/{limit}
Route::prefix('aysem')->group(function () {
	// Get all aysem
	Route::get('/{limit}', [ClassesController::class, 'getAysems']);
});