<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChairpersonGradController;

// ? --> {PORT}/api/grad-students/
Route::prefix('grad-students')->group(function () {
    // Get all students that are graduating
    Route::get('/all', [ChairpersonGradController::class, 'getAllGraduatingStudents']);

    Route::get('/1/{studentId}', [ChairpersonGradController::class, 'searchGraduatingStudents']);
});