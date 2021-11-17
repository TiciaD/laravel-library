<?php

use App\Http\Controllers\AuthorsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:api')->prefix('v1')->group(function() {
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    Route::apiResource('/authors', AuthorsController::class);
    Route::apiResource('/books', BooksController::class);
    Route::get('/users',[UserController::class, 'index']);
    Route::post('/user',[UserController::class, 'create']);
    Route::put('/user',[UserController::class, 'update']);
});

//author/{author}
//route for one specific author