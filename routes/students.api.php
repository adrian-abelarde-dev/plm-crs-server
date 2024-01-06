<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentTermController;

// ? --> {PORT}/api/students/
Route::prefix('students')->group(function () {
	// Get all student terms with the largest aysem value
	Route::get('/all', [StudentTermController::class, 'getAllStudentTerms']);

	// Create a student term
	Route::post('/1/{studentId}', [StudentTermController::class, 'insertStudent']);

	// Update a student term
	Route::put('/1/{studentTermId}', [StudentTermController::class, 'updateStudent']);
});