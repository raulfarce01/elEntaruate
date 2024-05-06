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
        $ingredienteNew = new Ingrediente();

        if($name != null && $name != "" && strlen($name) == 0 && count($allIngredientes) > 0){

            foreach ($allIngredientes as $ingredienteDB){
                if(strtoupper($name) == strtoupper($ingredienteDB->name)){
                    $existe = true;
                    return $ingredienteDB;
                }
            }

        }else{

            $ingredienteNew->nombre = $name;
            $ingredienteNew->save();

            return $ingredienteNew;

        }

        if(!$existe){
            $ingredienteNew->nombre = $name;
            $ingredienteNew->save();

            return $ingredienteNew;
        }

        return new Response(json_encode(array( "result" => -1, "message" => "El nombre indicado para el ingrediente no es válido." )));


    }
}
