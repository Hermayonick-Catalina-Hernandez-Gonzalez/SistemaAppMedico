<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultasSecretarioController extends Controller
{
    public function index(Request $request)
    {;
        return view('secretario.consultas');
    }


}
