<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultasMEDICOController extends Controller
{
    public function index()
    {
        return view('medico.consultas');
    }
}
