<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class productosRsrc extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $registros = DB::table('entradas')->where('estado', 1);
        // if($request->search){
        //     $registros->where('nombre', 'LIKE', "%$request->search%");
        // }
        // return $registros->paginate(config('miconfig.por_pagina'));
        $registros = DB::table('entradas AS e')
            ->select(
                'e.*',
                DB::raw('IFNULL(SUM(c.cantidad), 0) AS comprado'),
                DB::raw('CAST(e.cantidad - IFNULL(SUM(c.cantidad), 0) AS UNSIGNED) AS stock')
            )
            ->leftJoin('compras AS c', 'c.entradas_id', '=', 'e.id')
            ->where('e.estado', 1)
            ->where(DB::raw('IFNULL(c.estado, 1)'), 1);
            
        if($request->search){
            $registros->where('e.nombre', 'LIKE', "%$request->search%");
        }
        $registros->groupBy('e.id');
        return $registros->paginate(config('miconfig.por_pagina'));
        
        // return response()->json($registros);
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $compras = DB::table('compras')->where('estado', 1)->where('entradas_id', $id)->get();
        // $entrada = DB::table('entradas')->where('id', $id)->get()[0];
        // $num_compras = DB::table('compras')->select(DB::raw('COUNT(compras.id) AS num'))->where('estado', 1)->where('entradas_id', $id)->value('num');

        $registro = DB::table('entradas AS e')
            ->select(
                'e.*',
                DB::raw('IFNULL(SUM(c.cantidad), 0) AS comprado'),
                DB::raw('CAST(e.cantidad - IFNULL(SUM(c.cantidad), 0) AS UNSIGNED) AS stock')
            )
            ->leftJoin('compras AS c', 'c.entradas_id', '=', 'e.id')
            ->where('e.estado', 1)
            ->where(DB::raw('IFNULL(c.estado, 1)'), 1)
            ->where('e.id', $id)
            ->groupBy('e.id')
            ->first();

        if($registro){
            // return response()->json([
            //     $registro, 
            //     $num_compras
            // ]);
            
            return response()->json($registro);
            
        }else{
            return "error";
        }

        // return response()->json([
        //     'entrada' => $entrada,
        //     'stock' => $stock,
        // ]);
        
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
