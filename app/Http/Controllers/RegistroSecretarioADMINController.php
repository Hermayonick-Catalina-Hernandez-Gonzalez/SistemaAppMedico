<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroSecretarioADMINController extends Controller
{
    public function index()
    {
        return view('admin.registro-secretarios');
    }
}
