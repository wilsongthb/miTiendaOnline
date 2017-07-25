<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entradasModel as Mdl;
use DB;

class misproductosRsrc extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Mdl::where('user_id', $request->user_id)->paginate(config('miconfig.por_pagina'));
        $registros = DB::table('entradas AS e')
            ->select(
                'e.*',
                DB::raw('IFNULL(SUM(c.cantidad), 0) AS comprado'),
                DB::raw('CAST(e.cantidad - IFNULL(SUM(c.cantidad), 0) AS UNSIGNED) AS stock')
            )
            ->leftJoin('compras AS c', 'c.entradas_id', '=', 'e.id')
            ->where('e.estado', 1)
            ->where(DB::raw('IFNULL(c.estado, 1)'), 1)
            ->where('e.user_id', $request->user_id);
            
        // if($request->search){
        //     $registros->where('e.nombre', 'LIKE', "%$request->search%");
        // }
        $registros->groupBy('e.id');
        return $registros->paginate(config('miconfig.por_pagina'));
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
        $registro = new Mdl;

        if($request->hasFile('imagen')){
            $this->validate($request, [
                'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
            ]);
            $imageName = time().'.'.$request->imagen->getClientOriginalExtension();
            $request->imagen->move(public_path('imagenes'), $imageName);
            $registro->image_url = url('imagenes/'. $imageName);
            // echo $imageName;
            // // $path = $request->file('imagen')->store('imagenes');
        }

        $registro->nombre = $request->nombre;
        $registro->palabras_clave = $request->palabras_clave;
        $registro->metadatos = $request->metadatos;
        $registro->descripcion = $request->descripcion;
        $registro->precio = $request->precio;
        $registro->cantidad = $request->cantidad;
        $registro->user_id = $request->user_id;
        
        $registro->save();
        // return "ok";
        return redirect('/misproductos');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $registro = DB::table('entradas AS e')
        //     ->select(
        //         'e.*',
        //         DB::raw('IFNULL(SUM(c.cantidad), 0) AS comprado'),
        //         DB::raw('CAST(e.cantidad - IFNULL(SUM(c.cantidad), 0) AS UNSIGNED) AS stock')
        //     )
        //     ->leftJoin('compras AS c', 'c.entradas_id', '=', 'e.id')
        //     ->where('e.estado', 1)
        //     ->where(DB::raw('IFNULL(c.estado, 1)'), 1)
        //     ->where('e.id', $id)
        //     // ->where('')
        //     ->groupBy('e.id')
        //     ->first();

        // if($registro){
        //     // return response()->json([
        //     //     $registro, 
        //     //     $num_compras
        //     // ]);
            
        //     return response()->json($registro);
            
        // }else{
        //     return "error";
        // }
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
