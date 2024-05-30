<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'usuario_reservas';

    protected $fillable = [
        'userId'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
