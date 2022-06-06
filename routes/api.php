<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Review
Route::get("/review", [ReviewController::class, 'index']);
Route::get("/review/{id}",[\App\Http\Controllers\ReviewController::class, "show"]);
Route::middleware('auth:sanctum')->group(function() {
    Route::post('/review', [\App\Http\Controllers\ReviewController::class, 'create']);
    Route::delete("/review/{id}",[\App\Http\Controllers\ReviewController::class, "destroy"]);
    
});

//User
Route::post("/register", [\App\Http\Controllers\UserController::class, 'register']);
Route::post("/login", [\App\Http\Controllers\UserController::class, 'login']);

//Sanctum
Route::group(['middleware => auth:sanctum'], function(){
    
});