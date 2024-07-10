<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('secretario.medicamentos', compact('productos'));
    }
}
