<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //obtener los pedidos
        try {
            $pedido = Pedido::orderBy('created_at', 'asc')->with(['cliente', 'estadopedido', 'chofer', 'provincia', 'producto'])->get();
            $response = $pedido;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'fechaFactura' => '',
                'express' => 'boolean',
                'direccion' => 'string',
                'gastoenvio' => 'required|numeric',
                'subtotal' => 'required|numeric',
                'gastoimpuesto' => 'required|numeric',
                'total' => 'required|numeric',
                'provincia_id' => 'numeric',
                'cliente_id' => 'required|numeric',
                'estadopedido_id' => 'required|numeric',
                'chofer_id' => 'numeric',



            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        DB::beginTransaction();

        try {
            //Instancia orden

            //Fecha actual o dada por el usuario depende de la aplicación
            $pedido = new Pedido();
            $pedidoguardado = new Pedido();
            $pedido->fechaFactura = $request->input('fechaFactura');
            $pedido->express = $request->input('express');
            //$pedido->express = (bool)json_decode(strtolower($request->input('express')));
            $pedido->direccion = $request->input('direccion');
            $pedido->gastoenvio = $request->input('gastoenvio');
            $pedido->subtotal = $request->input('subtotal');
            $pedido->gastoimpuesto = $request->input('gastoimpuesto');
            $pedido->total = $request->input('total');
            $pedido->provincia_id = $request->input('provincia_id');
            $pedido->cliente_id = $request->input('cliente_id');
            $pedido->estadopedido_id = $request->input('estadopedido_id');
            $pedido->chofer_id = $request->input('chofer_id');
            //Guardar encabezado
            $pedido->save();
            $pedidoguardado = $pedido->save();
            //Instancias Detalle orden
            //La siguiente variable debe contener todos los elementos necesarios para registrar el detalle de la orden
            $detalles = $request->input('detalles.detalles');
            // $detalles = json_decode($array);
            foreach ($detalles as $item) {
                $pedido->producto()->attach(
                    $item['productoId'],
                    [
                        'cantidad' => $item['cantidad'],
                        // 'pedido_id' => $item['pedido_id'],
                        'subtotal' => $item['subtotal']

                    ]
                );
            }
            DB::commit();
            $response = 'Orden creado!';
            return response()->json($response, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(
                $e->getMessage(),
                422
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //Obtener un producto
            $pedido = Pedido::where('id', $id)->with(['cliente', 'estadopedido', 'chofer.vehiculo', 'provincia', 'producto'])->first();
            $response = $pedido;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }


    public function showbyStatus($estado)
    {
        try {
            //Obtener un producto
            $pedido = Pedido::where('estadopedido_id', $estado)->with(['cliente', 'estadopedido', 'chofer.vehiculo', 'provincia', 'producto'])->get();
            $response = $pedido;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        //BASICO
        $validator = Validator::make($request->all(), [

            'express' => 'required',
            'direccion' => '',
            'gastoenvio' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'gastoimpuesto' => 'required|numeric',
            'total' => 'required|numeric',
            'provincia_id' => '',
            'cliente_id' => 'required|numeric',
            'chofer_id' => '',
            'estadopedido_id' => 'required|numeric'

        ]);
        //Retornar mensajes de validación
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        //Instancia
        $pedido = Pedido::find($id);
        $pedido->fechaFactura = $request->input('fechaFactura');
        $pedido->express = (bool)json_decode(strtolower($request->input('express')));
        $pedido->direccion = $request->input('direccion');
        $pedido->gastoenvio = $request->input('gastoenvio');
        $pedido->subtotal = $request->input('subtotal');
        $pedido->gastoimpuesto = $request->input('gastoimpuesto');
        $pedido->total = $request->input('total');
        $pedido->provincia_id = $request->input('provincia_id');
        $pedido->cliente_id = $request->input('cliente_id');
        $pedido->estadopedido_id = $request->input('estadopedido_id');
        $pedido->chofer_id = $request->input('chofer_id');



        //BASICO UPDATE IF

        //Actualizar videojuego
        if ($pedido->update()) {
            //Sincronice generos
            //Array de generos

            $response = 'Producto actualizado!';
            return response()->json($response, 200);
        }
        $response = [
            'msg' => 'Error durante la actualización'
        ];

        return response()->json($response, 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
