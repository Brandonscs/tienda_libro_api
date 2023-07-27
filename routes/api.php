<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\AuthorController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\LiteraryGenreController;
use App\Http\Controllers\Api\V1\Auth\AuthController;

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
    #---------------------------------Auth---------------------------------
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'jwt.auth'], function(){
        #---------------------------------Auth---------------------------------
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
        
        #---------------------------------Book---------------------------------
        Route::apiResource('books', BookController::class);

        #---------------------------------Author---------------------------------
        Route::apiResource('authors', AuthorController::class);

        #---------------------------------Category---------------------------------
        Route::apiResource('categories', CategoryController::class);

        #---------------------------------literary Genre---------------------------------
        Route::apiResource('literary_genres', LiteraryGenreController::class);
    });
});
