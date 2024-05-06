<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function addFavorito($platoId){

        return User::addFavorito($platoId);

    }

    public function removeFavorito($platoId){

        return User::removeFavorito($platoId);

    }
}
