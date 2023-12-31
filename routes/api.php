<?php

use App\Http\Controllers\Api\OrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([], function () {
    Route::apiResource('order', OrderController::class);
    Route::put('/order/{orderId}/update-status-ready', [OrderController::class, 'updateStatusReady']);
    Route::put('/order/{orderId}/update-status-preparation', [OrderController::class, 'updateStatusPreparation']);
    Route::put('/order/{orderId}/update-status-delivered', [OrderController::class, 'updateStatusDelivered']);

});
