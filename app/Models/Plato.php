<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cupon;
use App\Models\Pedido;
use App\Models\Ingrediente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plato extends Model
{
    use HasFactory;

    protected $table = 'platos';

    public function favoritos(){
        return $this->belongsToMany(User::class, 'favoritos', 'platoId', 'userId');
    }

    public function cupones(){
        return $this->belongsToMany(Cupon::class, 'cupon_plato', 'platoId', 'cuponId');
    }

    public function ingredientes(){
        return $this->belongsToMany(Ingrediente::class, 'plato_ingredientes', 'platoid', 'ingredienteId');
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class, 'plato_pedidos', 'platoId', 'pedidoId');
    }

    public static function addPlato($nombre, $ruta, $ingredientes){
        $plato = new Plato();
        $allPlatos = Plato::all();
        $existe = false;

        foreach ($allPlatos as $platoDB){

            if(strtoupper($platoDB->name) == strtoupper($nombre)){
                $existe = true;
            }

        }

        if(!$existe){
            $plato->nombre = $nombre;
            $plato->ruta = $ruta;
        }

        return $plato;
    }

    public static function updatePlato($platoId, $newNombre, $newRuta, $ingredientes){

        $plato = Plato::find($platoId);

        if(isset($plato)){

            $plato->nombre = $newNombre;
            $plato->ruta = $newRuta;

            foreach ($ingredientes as $ingrediente){

                $ingrediente = Ingrediente::find($ingrediente);

                if(isset($ingrediente)){

                    $ingredienteLast = $ingrediente->id;

                }else{

                    $ingredienteLast = Ingrediente::addIngrediente($ingrediente);

                }
                $plato->ingredientes()->attach($ingredienteLast->id);

            }

            $plato->save();

            return view('templates/platos_edit', [ 'idPlato' => $platoId ]);

        }

        return view('templates/platos_edit', [ 'idPlato' => $platoId, 'error' => 'No se ha localizado el plato con ID ' . $platoId ]);

    }

    public static function removePlato($platoId){

        $plato = Plato::find($platoId);

        if(isset($plato)){

            $plato->delete();
            return new Response(json_encode(array("result" => 1, "message" => "Plato borrado correctamente")));

        }

        return new Response(json_encode(array( "result" => -1, "message" => "No se ha encontrado el plato con el ID ". $platoId )));

    }

}
