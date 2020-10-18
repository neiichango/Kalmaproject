<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EstadopedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\TipovehiculoController;
use App\Http\Controllers\VehiculoController;
use App\Models\Tipovehiculo;

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
        //http://127.0.0.1:8000/api/v1/kalma/staff/
        Route::group(['prefix' => 'staff'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/staff/all
            Route::get('index', [ChoferController::class, 'index']);
            // http://127.0.0.1:8000/api/v1/kalma/staff/allstaff
            Route::get('all', [ChoferController::class, 'all']);
            // http://127.0.0.1:8000/api/v1/kalma/staff/{id}
            Route::get('/{id}', [ChoferController::class, 'show']);
        });


        //RUTAS CATEGORIA
        //http://127.0.0.1:8000/api/v1/kalma/categoria/
        Route::group(['prefix' => 'categoria'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/categoria/index
            Route::get('index', [CategoriaController::class, 'index']);
            // http://127.0.0.1:8000/api/v1/kalma/categoria/{id}
            Route::get('/{id}', [CategoriaController::class, 'show']);
        });


        //RUTAS VEHICULO
        Route::group(['prefix' => 'car'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/car/all
            Route::get('all', [VehiculoController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);


        });


        //RUTAS CLIENTE
        Route::group(['prefix' => 'cliente'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/cliente/index
            Route::get('index', [ClienteController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);
            //http://127.0.0.1:8000/api/v1/kalma/cliente/{id}
            Route::get('/{id}', [ClienteController::class, 'show']);
            //->middleware(['auth:api','scopes:Administrador']);
        });

        //RUTAS COLOR
        Route::group(['prefix' => 'color'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/color/index
            Route::get('index', [ColorController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);
        });


        //RUTAS ESTADOPEDIDO
        Route::group(['prefix' => 'estado'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/estado/index
            Route::get('index', [EstadopedidoController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);
        });

        //RUTAS PRODUCTO
        Route::group(['prefix' => 'producto'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/producto/index
            Route::get('index', [ProductoController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);

            // http://127.0.0.1:8000/api/v1/kalma/producto/all
            Route::get('all', [ProductoController::class, 'all']);

            // http://127.0.0.1:8000/api/v1/kalma/producto/{id}
            Route::get('/{id}', [ProductoController::class, 'show']);
        });

        //RUTAS ROL
        Route::group(['prefix' => 'rol'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/rol/index
            Route::get('index', [RolController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);

        });

        //RUTAS TALLA
        Route::group(['prefix' => 'talla'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/talla/index
            Route::get('index', [TallaController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);

        });

        //RUTAS TIPOVEHICULO
        Route::group(['prefix' => 'tipovehiculo'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/tipovehiculo/index
            Route::get('index', [TipovehiculoController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);

        });
    });
});
