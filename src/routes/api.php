<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RatesController;
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



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
	Route::apiResource('drivers', DriversController::class)->except(['create', 'edit']);
	Route::post('drivers/assign_car', [DriversController::class, 'assignCarToDriver']);
	Route::apiResource('cars', CarsController::class)->except(['create', 'edit']);
	Route::post('cars/attach_rates', [CarsController::class, 'attachRatesToCar']);
	Route::apiResource('rates', RatesController::class)->except(['create', 'edit', 'show']);

	Route::post('logout', [AuthController::class, 'logout']);
});


Route::apiResource('orders', OrdersController::class)->only(['index', 'store']);

