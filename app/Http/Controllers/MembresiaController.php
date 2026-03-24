<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use Illuminate\Http\Request;

class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $membresias = Membresia::all();
        return view('membresias.index',compact('membresias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('membresias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $request->validate([
            'nombre'=> 'required|string|max:255',
            'descripcion'=> 'required|string',
            'precio'=> 'required|numeric|min:0', 
            'duracion'=> 'required|integer|min:1', 
        ], 
        
        [   
            
            'nombre.required'=> 'Este campo es necesario',
            'descripcion.required'=> 'Este campo es necesario',
            'precio.required'=> 'Este campo es necesario',
            'duracion.required' => 'Este campo es necesario',

            'nombre.required'=> 'Este campo es necesario',
            'descripcion.required'=> 'Este campo es necesario',
            'precio.required'=> 'Este campo es necesario',
            'precio.numeric'=> 'El precio debe ser un número válido',
            'duracion.required'=> 'Este campo es necesario',
            'duracion.integer'=> 'La duración debe ser un número entero',
        ]);

        $membresia = Membresia::create($request->all());
        return redirect()->route('membresias.index');
    }

    /**
     * Display the specified resource.
     */ 
    public function show(Membresia $membresia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membresia $membresia)
    {
         return view('membresias.edit', compact('membresia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Membresia $membresia, Request $request)
    {

        $request->validate([
            'nombre'=> 'required|string|max:255',
            'descripcion'=> 'required|string',
            'precio'=> 'required|numeric|min:0', 
            'duracion'=> 'required|integer|min:1', 
        ], 
        
        [   
            
            'nombre.required'=> 'Este campo es necesario',
            'descripcion.required'=> 'Este campo es necesario',
            'precio.required'=> 'Este campo es necesario',
            'duracion.required' => 'Este campo es necesario',

            'nombre.required'=> 'Este campo es necesario',
            'descripcion.required'=> 'Este campo es necesario',
            'precio.required'=> 'Este campo es necesario',
            'precio.numeric'=> 'El precio debe ser un número válido',
            'duracion.required'=> 'Este campo es necesario',
            'duracion.integer'=> 'La duración debe ser un número entero',
        ]);

        $membresia->update($request->all());

        return redirect()->route('membresias.index')->with('success', 'Cliente actualizado correctamente');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membresia $membresia)
    {
        $membresia->delete();

        return redirect()->route('membresias.index');
    }
}
