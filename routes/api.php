<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

//Load Composer's autoloader
use vendor\autoload;

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











