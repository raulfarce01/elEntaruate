<?php

namespace App\Models;

use App\Models\Plato;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cupon extends Model
{
    use HasFactory;

    protected $table = 'cupones';

    public function platos(){
        return $this->belongsToMany(Plato::class, 'cupon_platos', 'cuponId', 'platoId');
    }
}
