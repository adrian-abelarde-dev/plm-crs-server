<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route for /api; display message
Route::get('/', function () {
    return response()->json(['message' => 'Welcome to CRS API!']);
});

// Include routes for authentication, sending JWT, etc.
// routes/api.php

//Additional .api.php
Route::group([], function () {
    // Include default API routes
    include __DIR__ . '/grad-students.api.php';
    include __DIR__ . '/grad-assessment-history.api.php';
    include __DIR__ . '/grad-payment-history.api.php';
    include __DIR__ . '/enrollment.api.php';
    include __DIR__ . '/grad-grades.api.php';
});










