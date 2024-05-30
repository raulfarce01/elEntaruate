<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Ingrediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasTeams;

class PlatoController extends Controller
{
    //

    public function addPlato(Request $request){

        $nombre = $request->input('nombre');
        $ruta = $request->input('ruta');
        $ingredientes = $request->input('ingredientes', []);

        $platoLastId = Plato::addPlato($nombre, $ruta, $ingredientes);

        $allIngredientes = Ingrediente::all();

        return view('templates/platos_gestion', ['allIngredientes' => $allIngredientes]);

    }

    public function removePlato($idPlato){

        return Plato::removePlato($idPlato);

    }

    public function updatePlato($idPlato, Request $request){

        $nombre = $request->input('nombre');
        $ruta = $request->input('ruta');
        $ingredientes = $request->input('ingredientes', []);

        return Plato::updatePlato($idPlato, $nombre, $ruta, $ingredientes);

    }

    public function editPlato($idPlato){

        return view('templates/platos_edit');

    }

    public function index(){

        return view('templates/platos_carta');

    }

    public function gestion(){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $allIngredientes = Ingrediente::all();

                return view('templates/platos_gestion', ['allIngredientes' => $allIngredientes]);

            }

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página']);

        }

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página']);

    }
}
