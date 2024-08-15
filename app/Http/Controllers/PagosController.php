<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PagosController extends Controller
{
    public function index(Request $request)
    {
        $query = Consulta::query();

        // Si hay una búsqueda, filtramos los resultados
        if ($request->filled('search')) {
            $query->whereHas('paciente', function($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->input('search') . '%');
            });
        }

        $consultas = $query->with(['paciente', 'medico'])->get();

        return view('secretario.pagos', compact('consultas'));
    }

    public function generarTicket($id)
    {
        $consulta = Consulta::find($id);

        if (!$consulta) {
            return redirect()->back()->with('error', 'Consulta no encontrada.');
        }

        $pdf = Pdf::loadView('pdf.ticket', ['consulta' => $consulta]);

        return $pdf->download('ticket_pago_' . $consulta->id . '.pdf');
    }

}

