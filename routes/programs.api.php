<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;

// Get all programs
Route::get('/programs/all', [ProgramController::class, 'getAll']);

// Get all programs by college
Route::get('/programs/byCollege/{collegeId}', [ProgramController::class, 'getByCollege']);

// Operations on a single program
Route::get('/programs/1/{programId}', [ProgramController::class, 'getOne']);
Route::put('/programs/1/{programId}', [ProgramController::class, 'updateOne']);
Route::delete('/programs/1/{programId}', [ProgramController::class, 'deleteOne']);
Route::post('/programs/1/{programId}', [ProgramController::class, 'addOne']);
