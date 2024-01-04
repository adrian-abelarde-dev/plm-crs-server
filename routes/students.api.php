<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentTermController;
use App\Http\Controllers\ChairpersonGradController;

// ? --> {PORT}/api/students/
Route::prefix('students')->group(function () {
	// Get all student terms with the largest aysem value
	Route::get('/all', [StudentTermController::class, 'getAllStudentTerms']);

	// Create a student term
	Route::post('/1/{studentId}', [StudentTermController::class, 'insertStudent']);

	// Update a student term
	Route::put('/1/{studentTermId}', [StudentTermController::class, 'updateStudent']);
});

// ? --> {PORT}/api/grad-students/
Route::prefix('grad-students')->group(function () {
	// Get all students that are graduating
	Route::get('/all', [ChairpersonGradController::class, 'getAllGraduatingStudents']);

	Route::get('/1/{studentId}', [ChairpersonGradController::class, 'searchGraduatingStudents']);
});