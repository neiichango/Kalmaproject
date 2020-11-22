<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $cliente = Cliente::orderBy('name', 'asc')->get();
            $response = $cliente;

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


        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try {
            //instancia
            $cliente = new Cliente();
            $cliente->name = $request->input('name');
            $cliente->phone = $request->input('phone');
            $cliente->email = $request->input('email');



            if ($cliente->save()) {

                $response = 'Cliente creado!';
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
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //Obtener un cliente
            $cliente = Cliente::where('id', $id)->first();
            $response = $cliente;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }


    public function update(Request $request,  $id)
    {
        //

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|numeric|size:8',
            'email' => 'required|email'

        ]);

        //Retornar mensajes de validación
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        //instancia
        $cliente = Cliente::find($id);
        $cliente->name = $request->input('name');
        $cliente->phone = $request->input('phone');
        $cliente->email = $request->input('email');


        //Actualizar cliente
        if ($cliente->update()) {

            $response = 'Videojuego actualizado!';
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
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
