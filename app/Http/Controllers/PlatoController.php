<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Ingrediente;
use Illuminate\Http\Request;
use Laravel\Jetstream\HasTeams;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlatoController extends Controller
{
    //

    public function addPlato(Request $request){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $nombre = $request->input('nombre');
                $ingredientes = $request->input('ingredientes', []);
                $precio = $request->input('precio');

                $file = $request->file('ruta');
                $nombreArchivo =  time()."_".strtr($file->getClientOriginalName(), ' ', '_');
                //\Storage::disk('publicDB')->put($nombreArchivo,  \File::get($file));
                $file->move(public_path('img/'), $nombreArchivo);

                $platoLastId = Plato::addPlato($nombre, $nombreArchivo, $ingredientes, $precio);

                $allIngredientes = Ingrediente::all();

                return redirect('/admin_gestion_platos');

            }

            $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página', 'platos' => $platos]);

        }

        $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página', 'platos' => $platos]);

    }

    public function removePlato($idPlato){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                return Plato::removePlato($idPlato);

            }

            $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página', 'platos' => $platos]);

        }

        $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página', 'platos' => $platos]);

    }

    public function updatePlato($idPlato, Request $request){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $nombre = $request->input('nombre');
                $ingredientes = $request->input('ingredientes', []);
                $precio = $request->input('precio');

                $rutaNueva = $request->file('rutaNueva');

                if($rutaNueva != null){
                    $file = $request->file('rutaNueva');
                    $nombreArchivo =  time()."_".strtr($file->getClientOriginalName(), ' ', '_');
                    //\Storage::disk('publicDB')->put($nombreArchivo,  \File::get($file));
                    $file->move(public_path('img/'), $nombreArchivo);

                    return Plato::updatePlato($idPlato, $nombre, $nombreArchivo, $precio, $ingredientes);

                }

                return Plato::updatePlato($idPlato, $nombre, null, $precio, $ingredientes);

            }

            $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página', 'platos' => $platos]);

        }

        $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página', 'platos' => $platos]);

    }

    public function editPlato($idPlato){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $plato = Plato::find($idPlato);
                $allIngredientes = Ingrediente::all();
                $ingredientesPlato = $plato::with('ingredientes')->find($idPlato)->ingredientes;

                return view('templates/platos_edit', [ 'plato' => $plato, 'allIngredientes' => $allIngredientes, 'ingredientesPlato' => $ingredientesPlato ]);
            }

            $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página', 'platos' => $platos]);

        }

        $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página', 'platos' => $platos]);

    }

    public function index(){

        $allPlatos = DB::table('platos')->orderBy('id', 'desc')->get();
        $favoritos = [];
        if(Auth::user()) {
            $favoritos = DB::table('favoritos')->where('userId', Auth::user()->id)->get();
        }

        foreach($allPlatos as $plato){

            $plato->ingredientes = Plato::with('ingredientes')->find($plato->id)->ingredientes;

        }

        return view('templates/platos_carta', ['allPlatos' => $allPlatos, 'favoritos' => $favoritos]);

    }

    public function gestion(){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $allIngredientes = Ingrediente::all();
                $allPlatos = Plato::all();

                return view('templates/platos_gestion', ['allIngredientes' => $allIngredientes, 'allPlatos' => $allPlatos]);

            }

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página', 'platos' => Plato::all()]);

        }

        return view('templates/index', ['error' => 'Debes ser administrador para ver esta página', 'platos' => Plato::all()]);

    }
}
