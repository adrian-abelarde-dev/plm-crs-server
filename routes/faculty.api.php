<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;

// ? --> {PORT}/api/students/
Route::prefix('faculty')->group(function () {
    // Get all faculty members
    Route::get('/all', [FacultyController::class, 'getAllFaculty']);

    // Search faculty member by facultyId
    Route::get('/1/{facultyId}', [FacultyController::class, 'searchFaculty']);

    // Create a faculty member
    Route::post('/1/{userId}/{facultyId}', [FacultyController::class, 'insertFaculty']);

    // Update a faculty member
    Route::put('/1/{facultyId}', [FacultyController::class, 'updateFaculty']);
});