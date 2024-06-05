<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index(){
        return view('medico.dashboard');
    }
}
