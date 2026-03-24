<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use Illuminate\Http\Request;

class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entrenadores = Entrenador::all();
        return view('entrenadores.index',compact('entrenadores'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entrenadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre'=> 'required|string|max:255',
            'especialidad'=> 'required|string',
            'edad'=> 'required|integer|min:0', 
            'correo'=> 'required|email|unique:entrenadores,correo', 
            'telefono'=> 'required|digits:10', 
        ], 
        
        [

            'nombre.required'=> 'Este campo es necesario',
            'edad.required'=> 'Este campo es necesario',
            'especialidad.required'=> 'Este campo es necesario',
            'correo.required'=> 'Este campo es necesario',
            'telefono.required' => 'Este campo es necesario',

            'correo.unique'=> 'El correo electrónico ya se encuentra en nuestros registros.',
            'telefono.digits'=> 'El teléfono debe tener exactamente 10 dígitos.',
            'edad.min'=> 'La edad no puede ser un número negativo.',
        ]);


        Entrenador::create($request->all());

        return redirect()->route('entrenadores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrenador $entrenador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrenador $entrenador)
    {
        return view('entrenadores.edit', compact('entrenador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrenador $entrenador)
    {
        $request->validate([
            'nombre'=> 'required|string|max:255',
            'especialidad'=> 'required|string',
            'edad'=> 'required|integer|min:0', 
            'correo'=> 'required|email|', 
            'telefono'=> 'required|digits:10', 
        ], 
        
        [

            'nombre.required'=> 'Este campo es necesario',
            'edad.required'=> 'Este campo es necesario',
            'especialidad.required'=> 'Este campo es necesario',
            'correo.required'=> 'Este campo es necesario',
            'telefono.required' => 'Este campo es necesario',

            'telefono.digits'=> 'El teléfono debe tener exactamente 10 dígitos.',
            'edad.min'=> 'La edad no puede ser un número negativo.',
        ]);

        $entrenador->update($request->all());

        return redirect()->route('entrenadores.index')->with('success', 'Entrenador actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrenador $entrenador)
    {
        $entrenador->delete();
        return redirect()->route('entrenadores.index');
    }
}
