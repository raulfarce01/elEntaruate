<?php

namespace App\Models;

use App\Models\Plato;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    public function platos(){
        return $this->belongsToMany(Plato::class, 'plato_pedidos', 'platoId', 'pedidoId');
    }

    public static function addPedido($fecha, $platos){

        if(/* Comprobar la sesión del usuario */){

            $pedido = new Pedido();

            $pedido->fecha = $fecha;
            $pedido->save();

            foreach ($platos as $plato){

                $pedido->platos()->attach($plato);

            }

            return new Response(json_encode(array("result" => 1, "message" => "Pedido creado correctamente")));

        }

        return new Response(json_encode(array("result" => -1, "message" => "Ha ocurrido un error en la realización del pedido")));

    }
}
