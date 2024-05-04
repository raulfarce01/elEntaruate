<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mesa extends Model
{
    use HasFactory;

    protected $table = 'mesas';

    public function users(){
        return $this->belongsToMany(User::class, 'usuario_reservas', 'mesaId', 'userId');
    }
}
