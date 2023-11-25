<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;


// Get all colleges
Route::get('/colleges/all', [CollegeController::class, 'getAll']);

// Operations on a single college
Route::get('/colleges/1/{collegeId}', [CollegeController::class, 'getOne']);
Route::put('/colleges/1/{collegeId}', [CollegeController::class, 'updateOne']);
Route::delete('/colleges/1/{collegeId}', [CollegeController::class, 'deleteOne']);
Route::post('/colleges/1/{collegeId}', [CollegeController::class, 'addOne']);

