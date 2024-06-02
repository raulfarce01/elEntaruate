<?php

namespace App\Models;

use App\Models\Mesa;
use App\Models\Plato;
use App\Models\Pedido;
use Illuminate\Http\Response;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
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
        return $this->hasMany(Pedido::class);
    }

    public function favoritos(){
        return $this->belongsToMany(Plato::class, 'favoritos', 'userId', 'platoId');
    }

    public function reservas(){
        return $this->hasOne(Reserva::class, 'userId', 'id');
    }

    public static function addFavorito($platoId){

        $user = User::find(Auth::id());
        $plato = Plato::find($platoId);

        if(isset($plato)){

            $user->favoritos()->detach($platoId);
            $user->favoritos()->attach($platoId);

            return redirect('/carta');

        }

        return redirect('/carta');

    }

    public static function removeFavorito($favId){

        $user = User::find(Auth::id());
        $fav = DB::table('favoritos')->where('userId', Auth::id())->where('id', $favId)->first();

        if(isset($fav)){

            $user->favoritos()->detach($fav);

            return redirect('/carta');

        }

        return redirect('/carta');

    }

    public static function removeFavoritoUser($idPlato){

        $user = User::find(Auth::id());
        $fav = DB::table('favoritos')->where('userId', Auth::id())->where('platoId', $idPlato)->first();

        if(isset($fav)){

            $user->favoritos()->detach($fav);

            return redirect('/user/favoritos');

        }

        return redirect('/user/favoritos');

    }

    public static function addReserva($fecha, $user, $nombre){

        $reserva = new Reserva();

        $reserva->fecha = $fecha;
        $reserva->nombre = $nombre;
        $reserva->userId = $user;
        $reservaId = $reserva->save();

        if(isset($reservaId) && $reservaId > 0){

            return redirect('/user/reservas');

        }

        return redirect('/user/reservas');


    }

    public static function removeReserva($idReserva){

        $reserva = Reserva::find($idReserva);

        $reserva->delete();

        return redirect('/user/reservas');

    }
}
