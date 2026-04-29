<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Cliente;
use Illuminate\Support\Carbon;

class AsistenciaController extends Controller
{
    public function index(Request $request)
    {
        $fecha = $request->input('fecha', Carbon::now()->toDateString());

        $asistencias = Asistencia::with('cliente')
            ->whereDate('fecha', $fecha)
            ->orderBy('fecha', 'asc')
            ->paginate(20)
            ->withQueryString();

        return view('asistencias.index', compact('asistencias', 'fecha'));
    }

    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        $existe = Asistencia::where('cliente_id', $request->cliente_id)
        ->whereDate('fecha', now())
        ->exists();

    if (!$existe) {
        Asistencia::create([
            'cliente_id' => $request->cliente_id,
            'fecha' => now()
        ]);
    }

    return redirect()->back();
    }

    public function destroy($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();

        return redirect()->route('asistencias.index');
    }
}