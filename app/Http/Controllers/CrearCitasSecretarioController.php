<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrearCitasSecretarioController extends Controller
{
    public function index(Request $request)
    {
        $servicio = $request->input('servicio');
        return view('secretario.crear-cita', compact('servicio'));
    }
}
