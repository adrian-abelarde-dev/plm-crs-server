<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlockController;


// ? --> {PORT}/api/blocks/
Route::prefix('blocks')->group(function () {
	// Get all blocks
	Route::get('/all', [BlockController::class, 'getAll']);

	// Get, update, and delete a single block
	Route::get('/1/{blockId}', [BlockController::class, 'getOne']);
	Route::put('/1/{blockId}', [BlockController::class, 'updateOne']);
	Route::delete('/1/{blockId}', [BlockController::class, 'deleteOne']);

	// Create a new block
	Route::post('/', [BlockController::class, 'createOne']);
});

