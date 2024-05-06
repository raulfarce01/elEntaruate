<?php

namespace App\Models;

use App\Models\Plato;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cupon extends Model
{
    use HasFactory;

    protected $table = 'cupones';

    public function platos(){
        return $this->belongsToMany(Plato::class, 'cupon_platos', 'cuponId', 'platoId');
    }

    public function addCupon($nombre, $descripcion, $caducidad = 0, $porcentaje = 0){

        $cupon = new Cupon();
        $allCupones = Plato::all();
        $existe = false;

        foreach ($allCupones as $cuponDB){

            if(strtoupper($cuponDB->name) == strtoupper($nombre)){
                $existe = true;
            }

        }

        if(!$existe){

            $cupon->nombre = $nombre;
            $cupon->descripcion = $descripcion;
            $cupon->porcentaje = $porcentaje;
            $cupon->caducidad = $caducidad;
            $cupon->save();

            return new Response(json_encode(array( "result" => 1, "message" => "Cupón añadido correctamente" )));

        }

        return new Response(json_encode(array( "result" => -1, "message" => "No se ha podido añadir el cupon porque ya existe uno con el mismo nombre" )));

    }

    public function removeCupon($idCupon){

        $cupon = Cupon::find($idCupon);

        if(isset($cupon)){

            $cupon->activo = false;

            return new Response(json_encode(array( "result" => 1, "message" => "Cupón desactivado correctamente." )));

        }

        return new Response(json_encode(array( "result" => -1, "message" => "No se ha encontrado el cupón co ID " . $idCupon )));

    }
}
