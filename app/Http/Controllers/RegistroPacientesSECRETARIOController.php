<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroPacientesSECRETARIOController extends Controller
{
    public function index()
    {
        return view('secretario.registro-pacientes');
    }
}
