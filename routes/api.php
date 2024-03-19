<?php

use App\Http\Controllers\API\Product\FilterListController;
use App\Http\Controllers\API\Product\IndexController;
use App\Http\Controllers\API\Product\ShowController;
use App\Http\Controllers\API\User\StoreController;
use App\Http\Controllers\AuthController;
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


Route::post('/orders', \App\Http\Controllers\API\Order\StoreController::class);


Route::group(['namespace' => 'API/User', 'prefix' => 'users'], function (){
    Route::post('/', [StoreController::class, '__invoke']);
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::group(['middleware' => 'jwt.auth'], function (){
        Route::group(['namespace' => 'API/Product', 'prefix' => 'products'], function (){
            Route::post('/', [IndexController::class, '__invoke']);
            Route::get('/filters', [FilterListController::class, '__invoke']);
            Route::get('/{product}', [ShowController::class, '__invoke']);
            Route::post('/review', [\App\Http\Controllers\API\Product\StoreController::class, '__invoke']);
        });
    });
});
