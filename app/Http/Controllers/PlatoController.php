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

        $platoLast = Plato::addPlato($nombre, $ruta, $ingredientes);
        foreach ($ingredientes as $ingrediente){

            $ingredienteNew = Ingrediente::find($ingrediente);

            if(isset($ingredienteNew)){

                $ingredienteLast = $ingredienteNew->id;

            }else{

                $ingredienteLast = Ingrediente::addIngrediente($ingrediente);

            }
            $platoLast->ingredientes()->attach($ingredienteLast->id);

        }

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
