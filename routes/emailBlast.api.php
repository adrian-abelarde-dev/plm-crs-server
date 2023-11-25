<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailBlastController;

// POST route for sending email credentials
Route::post('/email-blast', [EmailBlastController::class, 'sendCredentials']);
