<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Hash;
use App\vendedoresModel;

class cuentaController extends Controller
{
    public function index(Request $request){
        if($request->user_id){
            $user = DB::table('users')->select('id', 'name', 'email')
                ->where('id', $request->user_id)
                ->get()[0];
            $vendedor = [];

            $num_vendedores = count(DB::table('vendedores')->where('user_id', $request->user_id)->get());

            if($num_vendedores !== 0){// si no hay vendedor, crea uno
                $vendedor = vendedoresModel::where('user_id', $request->user_id)->first();
            }else{
                $vendedor = new vendedoresModel;
                $vendedor->user_id = $request->user_id;
                $vendedor->pais = "no definido";
                $vendedor->region = "no definido";
                $vendedor->codigo_postal = "0000";
                $vendedor->direccion = "no definido";
                $vendedor->ruc = "no definido";
                $vendedor->razon_social = "no definido";
                $vendedor->nombres = "no definido";
                $vendedor->apellido_paterno = "no definido";
                $vendedor->apellido_materno = "no definido";
                $vendedor->dni = "70413794";
                $vendedor->key_token = "no definido";
                $vendedor->save();
            }

            return [
                'user' => $user,
                'vendedor' => $vendedor
            ];
        }
    }
    public function user(Request $request){
        $registro = User::find($request->id);
        $registro->name = $request->name;
        $registro->email = $request->email;
        $registro->save();
    }

    public function clave(Request $request){
        

        // return $request->all();
        $registro = User::find($request->id);

        // return [
        //     $request->all(),
        //     $request->old_password,
        //     bcrypt($request->old_password),
        //     // bcrypt($request->old_password),
        //     // bcrypt($request->old_password),
        //     "-",
        //     Hash::make($request->old_password),
        //     // Hash::make($request->old_password),
        //     "-",
        //     $registro->password,
        //     Hash::make($registro->password),
        //     // bcrypt($registro->password)
        // ];
        
        if($request->password){
            $registro->password = bcrypt($request->password);
            $registro->save();
            return "ok";
        }
        return "error";
    }
    public function vendedor(Request $request){
        // pais
        // codigo_postal
        // direccion
        // // ruc
        // // razon_social
        // // nombres
        // // apellido_paterno
        // // apellido_materno
        // // dni
        // // key_token
        // // return [
        // //     $request->all(),
            
        // // ];

        $registro = vendedoresModel::where('user_id', $request->user_id)->first();

        // return print_r($registro, true);
        $registro->pais = $request->pais;
        $registro->region = $request->region;
        $registro->codigo_postal = $request->codigo_postal;
        $registro->direccion = $request->direccion;
        $registro->ruc = $request->ruc;
        $registro->razon_social = $request->razon_social;
        $registro->nombres = $request->nombres;
        $registro->apellido_paterno = $request->apellido_paterno;
        $registro->apellido_materno = $request->apellido_materno;
        $registro->dni = $request->dni;
        $registro->key_token = $request->key_token;
        $registro->save();
        return "ok";
        
    }
}
