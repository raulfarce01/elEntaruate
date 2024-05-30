<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function addFavorito($platoId){

        return User::addFavorito($platoId);

    }

    public function removeFavorito($platoId){

        return User::removeFavorito($platoId);

    }

    public function reservasUser(){

        $reservasUser = User::with('reservas')->find(auth()->user()->id);

        return new Response(json_encode(array('result' => 1, 'reservas' => $reservasUser)));

    }

    public function pageReservasUser(){

        $sql = "SELECT nombre, fecha, id FROM usuario_reservas WHERE userId = " . auth()->user()->id;
        $reservasSQL = DB::table('usuario_reservas')->where('userId', auth()->user()->id)->orderBy('fecha', 'asc')->get();
        $res = array();

        foreach($reservasSQL as $reserva){

            $dateFecha = date_create($reserva->fecha);
            $fecha = $dateFecha->format('d/m/Y');
            $hora = $dateFecha->format('H:i');

            $res[] = [
                'id' => $reserva->id,
                'nombre' => $reserva->nombre,
                'fecha' => $fecha,
                'hora' => $hora
            ];
        }


        return view('templates/user_reservas', ['reservas' => $res]);

    }
}
