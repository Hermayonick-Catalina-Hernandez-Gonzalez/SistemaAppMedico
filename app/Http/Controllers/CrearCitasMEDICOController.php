<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrearCitasMEDICOController extends Controller
{
    public function index()
    {
        return view('medico.crear-cita');
    }
}
