<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradStudentController;


Route::prefix('grad-assessment-history')->group(function () {
	// Get all assessment histories
	//Route::get('/all', [GradStudentController::class, 'getAssessment']);
    //Get single record
    Route::get('/1/{studNum}', [GradStudentController::class, 'getAssessment']);

});

?>