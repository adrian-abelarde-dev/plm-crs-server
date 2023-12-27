<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;

// ? --> {PORT}/api/programs/
Route::prefix('programs')->group(function () {
	// Get all programs
	Route::get('/all', [ProgramController::class, 'getAll']);

	// Get all programs by college
	Route::get('/by-college/{collegeId}', [ProgramController::class, 'getByCollege']);

	// Operations on a single program
	Route::get('/1/{programId}', [ProgramController::class, 'getOne']);
	Route::put('/1/{programId}', [ProgramController::class, 'updateOne']);
	Route::delete('/1/{programId}', [ProgramController::class, 'deleteOne']);
	Route::post('/1/{programId}', [ProgramController::class, 'addOne']);

	// toggle status
	Route::put('/toggle-status/{programId}', [ProgramController::class, 'toggleStatus']);
});