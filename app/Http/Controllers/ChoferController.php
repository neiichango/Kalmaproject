<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use Illuminate\Http\Request;

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
        //
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
