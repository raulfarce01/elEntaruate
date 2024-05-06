<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class PedidoController extends Controller
{
    //

    public function addPedido(Request $request){

        $fecha = new DateTime();
        $platos = $request->input('platos', []);

        return Pedido::addPedido($fecha, $platos);

    }
}
