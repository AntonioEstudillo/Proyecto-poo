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

        $asistencias = Asistencia::with('asistible')
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
    $tipo = $request->input('tipo', ''); 
    $id = $request->sujeto_id; 

    if ($tipo === 'entrenador') {
        $modelClass = \App\Models\Entrenador::class;
    } else {
        $modelClass = \App\Models\Cliente::class;
    }

    $existe = Asistencia::where('asistible_id', $id)
        ->where('asistible_type', $modelClass)
        ->whereDate('fecha', now())
        ->exists();

    if (!$existe) {
        $sujeto = $modelClass::findOrFail($id);
        
        $sujeto->asistencias()->create([
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