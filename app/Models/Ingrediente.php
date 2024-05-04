<?php

namespace App\Models;

use App\Models\Plato;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingrediente extends Model
{
    use HasFactory;

    protected $table = 'ingredientes';

    public function platos(){
        return $this->belongsToMany(Plato::class, 'plato_ingredientes', 'ingredienteId', 'platoId');
    }

    public static function addIngrediente($name){
        $existe = false;
        $allIngredientes = Ingrediente::all();
        $ingrediente = new Ingrediente();

        if($ingrediente != null && $ingrediente != "" && strlen($name) > 0){

            foreach ($allIngredientes as $ingredienteDB){
                if(strtoupper($name) == strtoupper($ingredienteDB->name)){
                    $existe = true;
                }
            }

        }else{
            return new Response(json_encode(array( "result" => -1, "message" => "El nombre indicado para el ingrediente no es válido." )));
        }

        if(!$existe){
            $ingrediente->name = $name;
            $ingrediente->save();
        }

    }
}
