<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EstadopedidoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\TipovehiculoController;
use App\Http\Controllers\VehiculoController;
use App\Models\Producto;
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
        //http://127.0.0.1:8000/api/v1/kalma/chofer/
        Route::group(['prefix' => 'chofer'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/chofer
            Route::get('', [ChoferController::class, 'index'])->middleware(['auth:api']);

            // http://127.0.0.1:8000/api/v1/kalma/chofer/register
            Route::post('', [ChoferController::class, 'store'])->middleware(['auth:api']);

            // http://127.0.0.1:8000/api/v1/kalma/chofer/all
            Route::get('all', [ChoferController::class, 'all'])->middleware(['auth:api']);

            // http://127.0.0.1:8000/api/v1/kalma/chofer/{id}
            Route::get('/{id}', [ChoferController::class, 'show'])->middleware(['auth:api']);

            //http://127.0.0.1:8000/api/v1/kalma/chofer/{id}
            Route::patch('/{id}', [ChoferController::class, 'update'])->middleware(['auth:api']);
        });


        //RUTAS CATEGORIA
        //http://127.0.0.1:8000/api/v1/kalma/categoria/
        Route::group(['prefix' => 'categoria'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/categoria/index
            Route::get('', [CategoriaController::class, 'index']);
            // http://127.0.0.1:8000/api/v1/kalma/categoria/{id}
            Route::get('/{id}', [CategoriaController::class, 'show']);
        });


        //RUTAS VEHICULO
        Route::group(['prefix' => 'car'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/car/all
            Route::get('', [VehiculoController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);
            Route::get('/{id}', [VehiculoController::class, 'show']);
            //->middleware(['auth:api','scopes:Administrador']);


        });


        //RUTAS CLIENTE
        Route::group(['prefix' => 'cliente'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/cliente/index
            Route::get('', [ClienteController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);

            // http://127.0.0.1:8000/api/v1/kalma/cliente/register
            Route::post('', [ClienteController::class, 'store']);

            //http://127.0.0.1:8000/api/v1/kalma/cliente/{id}
            Route::get('/{id}', [ClienteController::class, 'show']);
            //->middleware(['auth:api','scopes:Administrador']);

            //http://127.0.0.1:8000/api/v1/kalma/cliente/{id}
            Route::patch('/{id}', [ClienteController::class, 'update']);
        });

        //RUTAS COLOR
        Route::group(['prefix' => 'color'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/color/index
            Route::get('', [ColorController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);
        });


        //RUTAS ESTADOPEDIDO
        Route::group(['prefix' => 'estado'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/estado/index
            Route::get('', [EstadopedidoController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);
        });

        //RUTAS PRODUCTO
        Route::group(['prefix' => 'producto'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/producto
            Route::get('', [ProductoController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);

            // http://127.0.0.1:8000/api/v1/kalma/producto
            Route::post('', [ProductoController::class, 'store'])->middleware(['auth:api']);;

            // http://127.0.0.1:8000/api/v1/kalma/producto/all
            Route::get('all', [ProductoController::class, 'all'])->middleware(['auth:api']);

            // http://127.0.0.1:8000/api/v1/kalma/producto/{id}
            Route::get('/{id}', [ProductoController::class, 'show']);

            //http://127.0.0.1:8000/api/v1/kalma/producto/{id}
            Route::patch('/{id}', [ProductoController::class, 'update'])->middleware(['auth:api']);
        });

        //RUTAS ROL
        Route::group(['prefix' => 'rol'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/rol/index
            Route::get('', [RolController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);

        });

        //RUTAS TALLA
        Route::group(['prefix' => 'talla'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/talla/index
            Route::get('', [TallaController::class, 'index']);
            //->middleware(['auth:api','scopes:Administrador']);

        });

        //RUTAS TIPOVEHICULO
        Route::group(['prefix' => 'tipovehiculo'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/tipovehiculo/index
            Route::get('', [TipovehiculoController::class, 'index']);
            //

        });

        //RUTAS TIPOVEHICULO
        Route::group(['prefix' => 'provincia'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/provincia/index
            Route::get('', [ProvinciaController::class, 'index']);
            //

        });

        //RUTAS PEDIDO
        Route::group(['prefix' => 'pedido'], function ($router) {
            // http://127.0.0.1:8000/api/v1/kalma/pedido/index
            Route::get('all', [PedidoController::class, 'index'])->middleware(['auth:api']);
            //->middleware(['auth:api','scopes:Administrador,Vendedor']);

            // http://127.0.0.1:8000/api/v1/kalma/pedido/register
            Route::post('', [PedidoController::class, 'store'])->middleware(['auth:api']);

            //http://127.0.0.1:8000/api/v1/kalma/pedido/{id}
            Route::patch('/{id}', [PedidoController::class, 'update']);

            // http://127.0.0.1:8000/api/v1/kalma/pedido/{id}
            Route::get('/{id}', [PedidoController::class, 'show']);

            // http://127.0.0.1:8000/api/v1/kalma/pedido/status/{id}
           Route::get('status/{id}', [PedidoController::class, 'showbyStatus']);
        });
    });
});
