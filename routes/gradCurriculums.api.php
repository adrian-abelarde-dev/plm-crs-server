<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradCurriculumsController;
use Illuminate\Support\Carbon;


// ? --> {PORT}/api/grad-curriculum/
Route::prefix('grad-curriculum')->group(function () {
	// Get all curriculums
	Route::get('/all', [GradCurriculumsController::class, 'getAllCurriculums']);

	// Get all 1 curriculum
	Route::get('/1/{curriculumId}', [GradCurriculumsController::class, 'getOneCurriculum']);

	//Create 1 curriculum
	Route::post('/create', [GradCurriculumsController::class, 'createCurriculum']);

	// Put 1 class in a curriculum
	Route::post('/insert/{curriculumId}/{courseId}', [GradCurriculumsController::class, 'putClassInCurriculum']);
});