<?php

namespace App\Models;

use App\Models\Plato;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cupon extends Model
{
    use HasFactory;

    protected $table = 'cupones';

    public function platos(){
        return $this->belongsToMany(Plato::class, 'cupon_platos', 'cuponId', 'platoId');
    }

    public static function addCupon($nombre, $descripcion, $caducidad = 0, $porcentaje = 0){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $cupon = new Cupon();
                $allCupones = Cupon::all();
                $existe = false;

                foreach ($allCupones as $cuponDB){

                    if(strtoupper($cuponDB->name) == strtoupper($nombre)){
                        $existe = true;
                    }

                }

                if(!$existe){

                    $cupon->name = $nombre;
                    $cupon->descripcion = $descripcion;
                    $cupon->porcentaje = $porcentaje;
                    $cupon->caducidad = $caducidad;
                    $cupon->save();

                    return redirect('/cupones');

                }

            }

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página']);

        }

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página']);

    }

    public static function removeCupon($idCupon){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $cupon = Cupon::find($idCupon);

                if(isset($cupon)){

                    $cupon->activo = false;

                    $cupon->save();

                    return redirect('/cupones');

                }

            }

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página']);

        }

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página']);

    }

    public static function activarCupon($cuponId){

        if(Auth::user()){

            $user = Auth::user();

            if($user->currentTeam->name == 'Admin'){

                $cupon = Cupon::find($cuponId);

                if(isset($cupon)){

                    $cupon->activo = true;

                    return redirect('/cupones');

                }

            }

            return view('templates/index', ['error' => 'Debes ser administrador para ver esta página']);

        }

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver esta página']);

    }

    public static function editCupon($cuponId, $nombre, $descripcion, $caducidad, $porcentaje, $platos){

        $cupon = Cupon::find($cuponId);

        if(isset($cupon) && $cupon != null){

            $cupon->name = $nombre;
            $cupon->descripcion = $descripcion;
            $cupon->porcentaje = $porcentaje;
            $cupon->caducidad = $caducidad;
            $cupon->activo = true;
            $cupon->save();

            $cupon->platos()->detach();

            foreach($platos as $plato){

                $plato = Plato::where('nombre', '=', $plato)->get();

                $cupon->platos()->attach($plato);

            }


            return redirect('/cupones');

        }

    }


}
