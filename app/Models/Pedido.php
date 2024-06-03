<?php

namespace App\Models;

use App\Models\Plato;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    public function platos(){
        return $this->belongsToMany(Plato::class, 'plato_pedidos', 'pedidoId', 'platoId');
    }

    public function users(){
        return $this->belongsTo(User::class, 'userId');
    }

    public static function addPedido($idMesa, $platos, $cupones){


        $newPlatos = [];

        if(Auth::user()){
            $user = Auth::user();
        }else{
            $user = User::find(2);
        }

        $pedido = new Pedido();

        if($cupones != null){

            foreach ($cupones as $cupon){

                $cupon = DB::select("SELECT * FROM platos INNER JOIN cupon_platos ON platos.id = cupon_platos.platoId WHERE cupon_platos.cuponId = " . $cupon);

                $newPlatos = $cupon;
            }

        }

        $date = new \DateTime();
        $fecha = $date->format('Y-m-d H:i:s');

        $pedido->fecha = $fecha;
        $pedido->mesa = $idMesa;
        $pedido->userId = $user->id;
        $pedido->save();

        if($platos != null){

            foreach ($platos as $plato){

                $plato = Plato::find($plato);

                $pedido->platos()->attach($plato->id);

            }

        }

        if($newPlatos != null){

            foreach ($newPlatos as $plato){

                $platoDB = Plato::find($plato->platoId);

                $pedido->platos()->attach($platoDB);

            }

        }

        return redirect('/pedidos/1');

    }
}
