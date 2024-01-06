<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradStudentController;


Route::prefix('grad-payment-history')->group(function () {
	// Get all payment histories
	//Route::get('/all', [GradStudentController::class, 'getPayment']);
    //Get single record
    Route::get('/1/{studNum}', [GradStudentController::class, 'getPayment']);

});

?>