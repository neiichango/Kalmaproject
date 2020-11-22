<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

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
        //obtener los productos activos
        try {
            $pedido = Pedido::orderBy('created_at', 'asc')->with(['cliente', 'estadopedido', 'chofer', 'provincia', 'detallepedido.producto'])->get();
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
        //

        /* Request entradas del formulario enviadas,
            debe establecer las entradas requeridas para crear el videojuego
         */
        //Especificar las reglas de validación para los campos del videojuego
        //https://laravel.com/docs/8.x/validation#available-validation-rules
        $validator = Validator::make(
            $request->all(),
            [

                'fechaFactura' => 'date',
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
            $pedido->fechaFactura = $request->input('nombre');
            $pedido->express = $request->input('descripcion');
            $pedido->direccion = $request->input('precio');
            $pedido->gastoenvio = $request->input('precio');
            $pedido->subtotal = $request->input('precio');
            $pedido->gastoimpuesto = $request->input('precio');
            $pedido->total = $request->input('precio');
            $pedido->provincia_id = $request->input('precio');
            $pedido->cliente_id = $request->input('precio');
            $pedido->estadopedido_id = $request->input('precio');




            //Guardar el videojuego en la BD
            if ($pedido->save()) {
                /*
            Asociarle varias generos
            Relación de muchos a muchos
            https://laravel.com/docs/8.x/eloquent-relationships#inserting-and-updating-related-models
            */

                /*
                //Solo es necesario con la imagen
                $generos = $request->input('genero_id');

                //Solo es necesario con la imagen
                if (!is_array($request->input('genero_id'))) {
                    //Formato array relación muchos a muchos
                    $generos =
                        explode(',', $request->input('genero_id'));
                }
                if (!is_null($request->input('genero_id'))) {
                    //Agregar generos
                    $vj->generos()->attach($generos);
                }
                */

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
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
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
    public function update(Request $request, Pedido $pedido)
    {
        //
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
