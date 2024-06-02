<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plato;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


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

    public function index(Request $request){

        $updateUser = $request->input('updateUser');
        $passwd = $request->input('password');
        $confirmPasswd = $request->input('password_confirmation');
        $email = $request->input('email');
        $telefono = $request->input('telefono');

        if($updateUser != null){

            if($passwd == $confirmPasswd){

            $revisaEmail = DB::table('users')->where('email', $email)->get();

            if($revisaEmail->count() > 0){

                return view('templates/user_perfil', ['user' => auth()->user(), 'error' => 'El correo ya está siendo usado']);

            }

            $revisaTelefono = DB::table('users')->where('telefono', $telefono)->get();

            if($revisaTelefono->count() > 0){

                return view('templates/user_perfil', ['user' => auth()->user(), 'error' => 'El teléfono ya está siendo usado']);

            }

            DB::transaction(function () use ($request) {
                return tap(User::find(auth()->user()->id)->update([
                    'telefono' => $request['telefono'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                ]));
            });

            }else{

                return view('templates/user_perfil', ['user' => auth()->user(), 'error' => 'Las contraseñas no coinciden']);

            }
        }

        if(Auth::user()){

            return view('templates/user_perfil', ['user' => auth()->user()]);

        }

        $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página', 'platos' => $platos]);

    }

    public function favoritos(){

        if(Auth::user()){

            $allFavoritos = DB::select("SELECT * FROM favoritos INNER JOIN platos ON favoritos.platoId = platos.id WHERE userId = " . auth()->user()->id);

            foreach($allFavoritos as $plato){

                $plato->ingredientes = Plato::with('ingredientes')->find($plato->id)->ingredientes;

            }

            return view('templates/user_favoritos', ['user' => auth()->user(), 'favoritos' => $allFavoritos]);

        }

        $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página', 'platos' => $platos]);

    }

    public function removeFavoritoUser($idPlato){

        return User::removeFavoritoUser($idPlato);

    }
}
