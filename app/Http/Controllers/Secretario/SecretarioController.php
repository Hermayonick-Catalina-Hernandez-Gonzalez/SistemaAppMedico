<?php

namespace App\Http\Controllers\Secretario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecretarioController extends Controller
{
    public function index(){
        return view('secretario.dashboard');
    }
}
