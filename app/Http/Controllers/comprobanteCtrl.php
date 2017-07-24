<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entradasModel;
use App\comprasModel;
use App\transaccionesModel;
use App\vendedoresModel;


class comprobanteCtrl extends Controller
{
    public function index($id){
        $compra = comprasModel::find($id);
        $transaccion = transaccionesModel::find($compra->transacciones_id);
        $entrada = entradasModel::find($compra->entradas_id);
        $vendedor = vendedoresModel::where('user_id', $entrada->user_id)->first();

        return [
            'compra' => $compra,
            'transaccion' => $transaccion,
            'entrada' => $entrada,
            'vendedor' => $vendedor
        ];
    }
}
