<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Plato;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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

    public function reservas(){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $newReservas = [];

                $allReservas = DB::table('usuario_reservas')->join('users', 'users.id', '=', 'usuario_reservas.userId')->orderBy('fecha', 'asc')->get();

                foreach($allReservas as $reserva){
                    $dateFecha = date_create($reserva->fecha);
                    $fecha = $dateFecha->format('d/m/Y');
                    $hora = $dateFecha->format('H:i');

                    $newReservas[] = ['id' => $reserva->id, 'nombre' => $reserva->nombre, 'fecha' => $fecha, 'hora' => $hora, 'telefono' => $reserva->telefono, 'solicitud' => $reserva->created_at];
                }

                return view('templates/reservas_gestion', ['allReservas' => $newReservas]);

            }

            $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página', 'platos' => $platos]);

        }

        $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página', 'platos' => $platos]);

    }
}
