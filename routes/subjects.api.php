<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectsController;

// ? --> {PORT}/api/grad-subject/
Route::prefix('grad-subject')->group(function () {
	// Create one grad subject
	Route::post('/1/{subjectId}', [SubjectsController::class, 'createGradSubject']);

	// Get all subjects
	Route::get('/all', [SubjectsController::class, 'getAllGradSubject']);

	// Find by subjectId
	Route::get('/1/{subjectId}', [SubjectsController::class, 'searchSubject']);

	// Edit subject
	Route::put('/1/{subjectId}', [SubjectsController::class, 'updateSubject']);
});

// ? --> {PORT}/api/subject/
Route::prefix('subject')->group(function () {
	// Create one undergrad subject
	Route::post('/1/{subjectId}', [SubjectsController::class, 'createUndergradSubject']);

	// Get all subjects
	Route::get('/all', [SubjectsController::class, 'getAllUndergradSubject']);

	// Find by subjectId
	Route::get('/1/{subjectId}', [SubjectsController::class, 'searchSubject']);

	// Edit subject
	Route::put('/1/{subjectId}', [SubjectsController::class, 'updateSubject']);
});

