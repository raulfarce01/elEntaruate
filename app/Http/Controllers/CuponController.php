<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    //

    public function addCupon(Request $request){

        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $caducidad = $request->input('caducidad');
        $porcentaje = $request->input('porcentaje');

        return Cupon::addCupon($nombre, $descripcion, $caducidad, $porcentaje);

    }

    public function removeCupon($cuponId){

        return Cupon::removeCupon($cuponId);

    }
}
