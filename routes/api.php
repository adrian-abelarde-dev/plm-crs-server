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

// Route for /api/login --> returns multiple user role inside an array
Route::get('/login/{email}', [UsersController::class, 'login']); 

// Route for /api/users --> Insert user data to database
Route::post('/user/1/{userId}', [UsersController::class, 'insertUser']); 

// Route for /api/user/1/{userId} --> Update user data to database
Route::put('/user/1/{userId}', [UsersController::class, 'updateUser']);

// Route for /api/user/all --> Get all users and its corresponding roles
Route::get('/user/all', [UsersController::class, 'getUsers']);

// Route for /api/user/1/{userId} -> Get a specific user
Route::get('/user/1/{userId}', [UsersController::class, 'getUserById']);









