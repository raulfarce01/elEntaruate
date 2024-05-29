<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function test(){

        return view('templates_test/forms');

    }

    public function index(){

        return view('templates/index');

    }

    public function sobre(){

        return view('templates/sobre');

    }

    public function contacto(){

        return view('templates/contacto');

    }
}
