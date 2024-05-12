<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    //

    public function addPlato(Request $request){

        $nombre = $request->input('nombre');
        $ruta = $request->input('ruta');
        $ingredientes = $request->input('ingredientes', []);

        $platoLastId = Plato::addPlato($nombre, $ruta, $ingredientes);

        return view('/platos');

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
}
