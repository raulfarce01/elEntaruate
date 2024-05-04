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
}
