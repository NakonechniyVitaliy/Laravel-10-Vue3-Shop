<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/products', \App\Http\Controllers\API\IndexController::class);
Route::get('/products/filters', \App\Http\Controllers\API\FilterListController::class);
Route::get('/products/{product}', \App\Http\Controllers\API\ShowController::class);
