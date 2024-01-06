<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UGGradesController;

// ? --> {PORT}/api/faculty/
Route::prefix('faculty')->group(function () {
    Route::get('/encoding-grades/new/{subjectId}/{blockId}', [UGGradesController::class, 'getStudentsOnStudentTerms']);
    Route::get('/encoding-grades/view/{subjectId}/{blockId}', [UGGradesController::class, 'getStudentsOnGrades']);
    
	Route::post('/encoding-grades/insert', [UGGradesController::class, 'insertGrades']);
});