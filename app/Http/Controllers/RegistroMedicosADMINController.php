<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroMedicosADMINController extends Controller
{
    public function index()
    {
        return view('admin.registro-medicos');
    }
}
