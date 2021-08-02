<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\EntranceController;
use App\Http\Controllers\Api\FloorController;
use App\Http\Controllers\Api\HouseController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SoldHouseController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function()  {
    Route::group(['prefix' => 'v1'], function (){

        Route::post('logout', [AuthController::class, 'logout']);

        Route::group(['prefix' => 'roles'], function () {
            Route::get('', [RoleController::class, 'index']);
            Route::post('', [RoleController::class, 'create']);
            Route::put('/{role}', [RoleController::class, 'update']);
            Route::delete('/{role}', [RoleController::class, 'destroy']);
        });

        Route::group(['prefix' => 'houses'], function () {
            Route::get('', [HouseController::class, 'index']);
            Route::get('/{id}', [HouseController::class, 'getById']);
            Route::post('', [HouseController::class, 'create']);
            Route::put('/{house}', [HouseController::class, 'update']);
            Route::delete('/{house}', [HouseController::class, 'destroy']);
        });

        Route::group(['prefix' => 'entrances'], function () {
            Route::get('', [EntranceController::class, 'index']);
            Route::get('/{id}', [EntranceController::class, 'getById']);
            Route::post('', [EntranceController::class, 'create']);
            Route::put('/{entrance}', [EntranceController::class, 'update']);
            Route::delete('/{entrance}', [EntranceController::class, 'destroy']);
        });

        Route::group(['prefix' => 'floors'], function () {
            Route::get('', [FloorController::class, 'index']);
            Route::get('/{id}', [FloorController::class, 'getById']);
            Route::post('', [FloorController::class, 'create']);
            Route::put('/{floor}', [FloorController::class, 'update']);
            Route::delete('/{floor}', [FloorController::class, 'destroy']);
        });

        Route::group(['prefix' => 'apartments'], function () {
            Route::get('', [ApartmentController::class, 'index']);
            Route::get('/{id}', [ApartmentController::class, 'getById']);
            Route::post('', [ApartmentController::class, 'create']);
            Route::put('/{apartment}', [ApartmentController::class, 'update']);
            Route::delete('/{apartment}', [ApartmentController::class, 'destroy']);
        });

        Route::group(['prefix' => 'clients'], function () {
            Route::get('', [ClientController::class, 'index']);
            Route::get('/{id}', [ClientController::class, 'getById']);
            Route::post('', [ClientController::class, 'create']);
            Route::put('/{client}', [ClientController::class, 'update']);
            Route::delete('/{client}', [ClientController::class, 'destroy']);
        });

        Route::group(['prefix' => 'soldHouses'], function () {
            Route::get('', [soldHouseController::class, 'index']);
            Route::get('/{id}', [soldHouseController::class, 'getById']);
            Route::post('', [soldHouseController::class, 'create']);
            Route::put('/{soldHouse}', [soldHouseController::class, 'update']);
            Route::delete('/{soldHouse}', [soldHouseController::class, 'destroy']);
        });

    });
});
