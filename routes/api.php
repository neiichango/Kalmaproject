<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\VehiculoController;

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


// http://127.0.0.1:8000/api

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'kalma'], function () {
        // http://127.0.0.1:8000/api/v1/kalma/


        //RUTAS AUTH
        Route::group([
            'prefix' => 'auth'
        ], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/auth/login
            Route::post('login', [AuthController::class, 'login']);

            // http://127.0.0.1:8000/api/v1/kalma/auth/register
            Route::post('register', [AuthController::class, 'register']);

            // http://127.0.0.1:8000/api/v1/kalma/auth/logout
            Route::post('logout', [AuthController::class, 'logout']);
        });


        //RUTAS CHOFER
        Route::group(['prefix' => 'staff'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/staff/all
            Route::get('all', [ChoferController::class, 'index']);
        });



        
        //RUTAS vehiculo
        Route::group(['prefix' => 'car'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/car/all
            Route::get('all', [VehiculoController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);
        });
    });
});
