<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroPacientesADMINController extends Controller
{
    public function index()
    {
        return view('admin.registro-pacientes');
    }
}
