<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradStudentController;


Route::prefix('grad-class')->group(function () {
	// Get all classes 
	Route::get('/all', [GradStudentController::class, 'getAllGradClass']);
    //Get single record
    //Route::get('/1/{studNum}', [GradStudentController::class, 'getAssessment']);

});

Route::post('/grad-enroll/{studNum}', [GradStudentController::class, 'postGradEnroll']);

?>