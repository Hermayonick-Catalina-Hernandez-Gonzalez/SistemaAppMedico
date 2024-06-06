<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultasSECRETARIOController extends Controller
{
    public function index()
    {
        return view('secretario.consultas');
    }
}
