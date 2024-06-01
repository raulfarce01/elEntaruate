<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function activarCupon($cuponId){

        return Cupon::activarCupon($cuponId);

    }

    public function index(){

        if(Auth::user()){

            if(Auth::user()->currentTeam->name == 'Admin'){
                $allCupones = Cupon::with('platos')->get();
            }else{
                $allCupones = Cupon::with('platos')->where('activo', '=', true)->get();
            }

            return view('templates/cupones', ['allCupones' => $allCupones]);

        }

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver tu perfil']);

    }

    public function editCupon($cuponId){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $cupon = Cupon::find($cuponId);

                if(isset($cupon)){

                    $allPlatos = DB::table('platos')->get();

                    return view('templates/cupones_edit', ['cupon' => $cupon, 'allPlatos' => $allPlatos]);

                }

            }

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página']);

        }

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página']);

    }

    public function editCuponPost($idCupon, Request $request){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $nombre = $request->input('nombre');
                $descripcion = $request->input('descripcion');
                $caducidadDate = $request->input('caducidad');
                $porcentaje = $request->input('porcentaje');
                $platos = $request->input('platos', []);

                return Cupon::editCupon($idCupon, $nombre, $descripcion, $caducidadDate, $porcentaje, $platos);

            }

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página']);

        }

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página']);

    }
}
