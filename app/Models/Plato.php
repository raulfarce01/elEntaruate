<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cupon;
use App\Models\Pedido;
use App\Models\Ingrediente;
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

}
