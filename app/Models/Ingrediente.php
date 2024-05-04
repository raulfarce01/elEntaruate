<?php

namespace App\Models;

use App\Models\Plato;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingrediente extends Model
{
    use HasFactory;

    protected $table = 'ingredientes';

    public function platos(){
        return $this->belongsToMany(Plato::class, 'plato_ingredientes', 'ingredienteId', 'platoId');
    }
}
