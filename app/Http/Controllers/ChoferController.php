<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $choferes = Chofer::wherenull("deleted_at")->with(["vehiculo.tipovehiculo"])->get();
            $response = $choferes;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function all()
    {

        try {
            $choferes = Chofer::orderBy("nombre", "asc")->with(["vehiculo.tipovehiculo"])->get();
            $response = $choferes;

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
        /*request de entradas del formulario enviadas, debe establecer las entradas requeridas para crear el chofer */

        //especificar las reglas de validacion para los campos


        $validator = Validator::make($request->all(), [
            'cedula' => 'required|size:9',
            'nombre' => 'required',
            'apellido1' => 'required',
            'apellido2' => 'required',
            'telefono' => 'required|size:8',
            'vehiculo_id' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try {
            //instancia
            $chofer = new Chofer();
            $chofer->cedula = $request->input('cedula');
            $chofer->nombre = $request->input('nombre');
            $chofer->apellido1 = $request->input('apellido1');
            $chofer->apellido2 = $request->input('apellido2');
            $chofer->telefono = $request->input('telefono');
            $chofer->vehiculo_id = $request->input('vehiculo_id');


            if ($chofer->save()) {

                $response = 'Personal de entrega creado!';
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
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            //Obtener un videojuego
            $chofer = Chofer::where('id', $id)->with(["vehiculo.tipovehiculo"])->first();
            $response = $chofer;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function edit(Chofer $chofer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chofer $chofer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chofer $chofer)
    {
        //
    }
}
