<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReservasController extends Controller
{
    //

    public function addReserva(Request $request){

        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $fechaReserva = date_create($fecha.' '.$hora);
        $nombre = $request->input('user');
        $user = Auth::id();

        $now = new DateTime();

        if($fechaReserva > $now){


            return User::addReserva($fechaReserva, $user, $nombre);

        }

        return redirect('/user/reservas');

    }

    public function removeReserva($idReserva){

        return User::removeReserva($idReserva);

    }
}
