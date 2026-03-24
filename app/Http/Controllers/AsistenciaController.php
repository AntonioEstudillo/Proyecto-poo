<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Cliente;

class AsistenciaController extends Controller
{
    // LISTAR
    public function index()
    {
        $asistencias = Asistencia::with('cliente')->get();
        return view('asistencias.index', compact('asistencias'));
    }

    // FORMULARIO
    public function create()
    {
        $clientes = Cliente::all();
        return view('asistencias.create', compact('clientes'));
    }

    // GUARDAR
    public function store(Request $request)
    {
        Asistencia::create([
            'cliente_id' => $request->cliente_id,
            'fecha' => now()
        ]);

        return redirect()->route('asistencias.index');
    }

    // ELIMINAR
    public function destroy($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();

        return redirect()->route('asistencias.index');
    }
}