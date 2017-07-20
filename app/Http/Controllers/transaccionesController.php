<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaccionesModel as t;
use App\comprasModel as c;

class transaccionesController extends Controller
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
        // return $request->all();
        $transaccion = new t;
        $transaccion->pais = $request->transaccion['pais'];
        $transaccion->region = $request->transaccion['region'];
        $transaccion->codigo_postal = $request->transaccion['codigo_postal'];
        $transaccion->direccion = $request->transaccion['direccion'];
        $transaccion->nombre = $request->transaccion['nombre'];
        $transaccion->tipo_documento = $request->transaccion['tipo_documento'];
        $transaccion->numero_documento = $request->transaccion['numero_documento'];
        $transaccion->email = $request->transaccion['email'];
        $transaccion->telefono = $request->transaccion['telefono'];

        // no requeridos
        if($request->user !== NULL){
            $transaccion->user_id = $request->user['id'];
        }
        
        $transaccion->save();

        // registrando compras
        foreach ($request->carrito as $key => $value) {
            // echo "$key -> ".print_r($value, true);
            $compra = new c;
            $compra->cantidad = $value['cantidad'];
            $compra->entradas_id = $value['producto']['id'];
            $compra->transacciones_id = $transaccion->id;
            if($request->user !== NULL){
                $compra->user_id = $request->user['id'];
            }
            $compra->save();
            // echo print_r($compra, true);
        }

        return "Compra registrada con exito";
        // return $transaccion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
