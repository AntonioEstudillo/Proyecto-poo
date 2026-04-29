<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Entrenador;
use App\Models\Membresia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Asistencia;

use function Symfony\Component\Clock\now;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $hoy = Carbon::now()->toDateString();

        $clientes = Cliente::with(['membresia', 'entrenador'])
        ->get()
        ->map(function ($cliente) use ($hoy) {

            $cliente->asistencia_hoy = $cliente->asistencias()
                ->whereDate('fecha', $hoy)
                ->exists();

            return $cliente;
        });

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $membresias = Membresia::all();
        $entrenadores = Entrenador::all();

        return view('clientes.create', compact('membresias', 'entrenadores'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre'=> 'required|string|max:255',
            'fecha_registro'=> 'required|date',
            'correo'=> 'required|email|unique:clientes,correo', 
            'telefono'=> 'required|digits:10', 
            'entrenador_id' => 'nullable|exists:entrenadores,id'
        ], 
        
        [   
            
            'nombre.required'=> 'Este campo es necesario',
            'fecha_registro.required'=> 'Este campo es necesario',
            'correo.required'=> 'Este campo es necesario',
            'telefono.required' => 'Este campo es necesario',

            'correo.unique' => 'El correo electrónico ya se encuentra en nuestros registros.',
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.'
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(Cliente $cliente)
    {
        $membresias = Membresia::all(); 
        $entrenadores = Entrenador::all();
        return view('clientes.edit', compact('cliente', 'membresias', 'entrenadores'));
        
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
       $request->validate([
            'nombre'=> 'required|string|max:255',
            'fecha_registro'=> 'required|date',
            'correo'=> 'required|email|',
            'entrenador_id' => 'nullable|exists:entrenadores,id'
        ], 
        
        [   
            
            'nombre.required'=> 'Este campo es necesario',
            'fecha_registro.required'=> 'Este campo es necesario',
            'correo.required'=> 'Este campo es necesario',
        ]);


        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete(); 
        return redirect()->route('clientes.index');
    }
}
