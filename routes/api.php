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

Route::post('login' , [\App\Http\Controllers\AuthController::class , 'login']);
Route::post('register', [\App\Http\Controllers\AuthController::class , 'register']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('regions' , \App\Http\Controllers\RegionController::class);
    Route::apiResource('products' , \App\Http\Controllers\ProductController::class);
    Route::apiResource('clients' , \App\Http\Controllers\ClientController::class);
    Route::apiResource('categories' , \App\Http\Controllers\CategoryController::class);
    Route::group(['prefix' => 'orders'] , function (){
        Route::apiResource('details' , \App\Http\Controllers\Order\OrderDetailController::class)->except('index');
        Route::get('details/{order_id}' , [\App\Http\Controllers\Order\OrderDetailController::class, 'index']);
        Route::apiResource('' , \App\Http\Controllers\Order\OrderController::class);
        Route::apiResource('statuses' , \App\Http\Controllers\Order\StatusController::class);
    });
});