<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroPacientesMEDICOController extends Controller
{
    public function index()
    {
        return view('medico.registro-pacientes');
    }
}
