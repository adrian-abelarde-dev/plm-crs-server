<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentTermController;

// ? --> {PORT}/api/students/
Route::prefix('students')->group(function () {
	// Create a student term
	Route::post('/1/{studentId}', [StudentTermController::class, 'insertStudent']);

	// Update a student term
	Route::put('/1/{studentId}', [StudentTermController::class, 'updateStudent']);



});