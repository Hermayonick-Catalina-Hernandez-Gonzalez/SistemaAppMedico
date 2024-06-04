<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
        if(auth()->user()->role === 'Médico'){
            return view('medico.home');
        } elseif(auth()->user()->role === 'Secretario'){
            return view('secretario.home');
        } elseif(auth()->user()->role === 'Administrador'){
            return view('administrador.home');
        } else {
            return view('paciente.home');
        }
    }
}
