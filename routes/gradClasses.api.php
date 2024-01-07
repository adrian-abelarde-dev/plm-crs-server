<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradClassesController;
use Illuminate\Support\Carbon;


// ? --> {PORT}/api/grad-class/
Route::prefix('grad-class')->group(function () {
	// Get all classes by faculty and aysem
	Route::get('/all/{facultyId}/{aysem}', [GradClassesController::class, 'getAll']);

	// Get all classes by faculty, aysem, and courseCode
	Route::get('/all/{facultyId}/{aysem}/course/{courseCode}', [GradClassesController::class, 'getAllCourseCode']);

	// Get by classId
	Route::get('/1/{classId}', [GradClassesController::class, 'getByClassId']);

	// Create 1 class by faculty and aysem
	Route::post('/1/{facultyId}/{aysem}', [GradClassesController::class, 'createOne']);

	// Update 1 class by classId
	Route::put('/1/{classId}', [GradClassesController::class, 'updateClass']);
});

// ? --> {PORT}/api/aysem/{limit}
Route::prefix('aysem')->group(function () {
	// Get all aysem
	Route::get('/{limit}', [GradClassesController::class, 'getAysems']);
});