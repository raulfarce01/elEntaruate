<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuponController extends Controller
{
    //

    public function addCupon(Request $request){

        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $caducidadDate = $request->input('caducidadDate');
        $caducidadHour = $request->input('caducidadHour');
        $porcentaje = $request->input('porcentaje');

        $caducidad = date_create($caducidadDate.' '.$caducidadHour);

        return Cupon::addCupon($nombre, $descripcion, $caducidad, $porcentaje);

    }

    public function removeCupon($cuponId){

        return Cupon::removeCupon($cuponId);

    }

    public function index(){

        if(Auth::user()){

            return view('templates/cupones');

        }

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver tu perfil']);

    }
}
