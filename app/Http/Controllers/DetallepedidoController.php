<?php

namespace App\Http\Controllers;

use App\Models\Detallepedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetallepedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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


                'express' => 'required|boolean',
                'direccion' => 'string',
                'gastoenvio' => 'required|numeric',
                'subtotal' => 'required|numeric',
                'gastoimpuesto' => 'required|numeric',
                'total' => 'required|numeric',
                'provincia_id' => 'numeric',
                'cliente_id' => 'required|numeric',
                'chofer_id' => 'numeric',
                'estadopedido_id' => 'required|numeric'

            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        try {
            //Instancia
            $pedido = new Pedido();
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




            //Guardar el videojuego en la BD
            if ($pedido->save()) {

                $response = 'Pedido  creado!';
                return response()->json($response, 201);
            } else {
                $response = [
                    'msg' => 'Error durante la creación'
                ];
                return response()->json($response, 404);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function show(Detallepedido $detallepedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Detallepedido $detallepedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detallepedido $detallepedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detallepedido $detallepedido)
    {
        //
    }
}
