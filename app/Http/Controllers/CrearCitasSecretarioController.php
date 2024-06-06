<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrearCitasSecretarioController extends Controller
{
    public function index()
    {
        return view('secretario.crear-cita');
    }
}
