<?php

namespace App\Models;

use App\Models\Mesa;
use App\Models\Plato;
use App\Models\Pedido;
use Illuminate\Http\Response;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'surnames', 'telefono', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function pedidos(){
        return $this->belongsToMany(Pedido::class);
    }

    public function favoritos(){
        return $this->belongsToMany(Plato::class, 'favoritos', 'userId', 'platoId');
    }

    public function reservas(){
        return $this->belongsToMany(Mesa::class, 'usuario_reservas', 'userId', 'mesaId');
    }

    public static function addFavorito($platoId){

        $user = User::find(Auth::id());
        $plato = Plato::find($platoId);

        if(isset($plato)){

            $user->favoritos()->attach($platoId);

            return new Response(json_encode(array( "result" => 1, "message" => "Se ha añadido el plato con ID " . $platoId . " a favoritos." )));

        }

        return new Response(json_encode(array( "result" => -1, "message" => "No se ha encontrado el plato con ID " . $platoId)));

    }

    public static function removeFavorito($platoId){

        $user = User::find(Auth::id());
        $plato = Plato::find($platoId);

        if(isset($plato)){

            $user->favoritos()->detach($platoId);

            return new Response(json_encode(array( "result" => 1, "message" => "Se ha eliminado el plato con ID " . $platoId . " de favoritos." )));

        }

        return new Response(json_encode(array( "result" => -1, "message" => "No se ha encontrado el plato con ID " . $platoId)));

    }

    public static function addReserva($fecha, $user){

        $reserva = new Reserva();

        $reserva->fecha = $fecha;
        $reserva->user()->attach($user);
        $reservaId = $reserva->save();

        if(isset($reservaId) && $reservaId > 0){

            return new Response(json_encode(array( "result" => 1, "message" => "Reserva realizada correctamente." )));

        }

        return new Response(json_encode(array( "result" => -1, "message" => "Ha ocurrido un error con su reserva. Inténtelo de nuevo." )));


    }

    public static function removeReserva($idReserva){

        $reserva = Reserva::find($idReserva);

        $reserva->delete();

    }
}
