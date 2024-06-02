<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function test(){

        return view('templates_test/forms');

    }

    public function index(){

        $platos = Plato::with('ingredientes')->take(4)->orderBy('created_at', 'desc')->get();

        return view('templates/index', ['platos' => $platos]);

    }

    public function sobre(){

        return view('templates/sobre');

    }

    public function contacto(){

        return view('templates/contacto');

    }
}
