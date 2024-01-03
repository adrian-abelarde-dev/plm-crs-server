<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradStudentController;


Route::get('grad-grades/all/{studNum}/{aysem}', [GradStudentController::class, 'getAllGrades']);


?>