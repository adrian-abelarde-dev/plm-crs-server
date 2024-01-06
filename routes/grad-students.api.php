<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradStudentController;


Route::prefix('grad-students')->group(function () {
	//test endpoint
	Route::get('/test/{studNum}', [GradStudentController::class, 'index']);
    //Get single record
    Route::get('/1/{studNum}', [GradStudentController::class, 'getStudent']);

});

?>