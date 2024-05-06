<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasController extends Controller
{
    //

    public function addReserva(Request $request){

        $fecha = $request->input('fecha');
        $user = $request->input('user');

        if(isset($user) && $user != null && $user != ""){

            $user = Auth::id();

        }

        $now = new DateTime();

        if($fecha > $now){

            return User::addReserva($fecha, $user);

        }

    }

    public function removeReserva($idReserva){

        return User::removeReserva($idReserva);

    }
}
