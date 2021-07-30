<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\EntranceController;
use App\Http\Controllers\Api\FloorController;
use App\Http\Controllers\Api\HouseController;
use App\Http\Controllers\Api\SoldHouseController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'v1'], function (){
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

//    Route::group(['prefix' => 'users'], function () {
//        Route::get('', [UserController::class, 'index']);
//        Route::get('/{id}', [UserController::class, 'getById']);
//        Route::post('', [UserController::class, 'create']);
//        Route::put('/{user}', [UserController::class, 'update']);
//        Route::delete('/{user}', [UserController::class, 'destroy']);
//    });
});
