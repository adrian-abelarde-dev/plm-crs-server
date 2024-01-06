<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;


// ? --> {PORT}/api/sections/
Route::prefix('sections')->group(function () {
	// Get all sections
	Route::get('/all', [SectionController::class, 'getAll']);

	// update single section
	Route::put('/1/{sectionID}', [SectionController::class, 'updateOne']);
	Route::put('/1/archive/{sectionID}', [SectionController::class, 'updateArchived']);

	// Create a new section
	Route::post('/1/{sectionID}', [SectionController::class, 'createOne']);
});