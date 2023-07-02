<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\AuthorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function() {
    Route::get('saludo', function(){
        return response()->json([
            'success' => true,
            'data' => [
                'name' => 'Brandon',
                'email' => 'brandon@gmail.com',
                'age' => 21
            ]        
        ]);
    });

    Route::apiResource('books', BookController::class);

    Route::apiResource('authors', AuthorController::class);
});
