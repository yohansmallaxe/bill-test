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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('bills',[\App\Http\Controllers\Api\BillController::class,'index']);
    Route::put('bill/{bill}',[\App\Http\Controllers\Api\BillController::class,'edit']);
});
Route::post('bill',[\App\Http\Controllers\Api\BillController::class,'bill']);
Route::post('register',[\App\Http\Controllers\Api\AuthController::class,'register']);
