@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100">
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <x-form-label>Nombre</x-form-label>
            <x-form-input type="text" name="nombre" value="{{ $cliente->nombre }}" />
        </div>

        <div>
            <x-form-label>Correo</x-form-label>
            <x-form-input type="email" name="correo" value="{{ $cliente->correo }}" />
        </div>

        <div>
            <x-form-label>Fecha de Registro</x-form-label>
            <x-form-input type="date" name="fecha_registro"
                value="{{ $cliente->fecha_registro->format('Y-m-d') }}" />
        </div>

        <div>
            <x-form-label>Entrenador</x-form-label>
            <select name="entrenador_id"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white outline-none transition-all">
                @if ($cliente->entrenador_id == null)
                    <option value="">Sin entrenador</option>
                    @foreach($entrenadores as $entrenador)
                    <option value="{{ $entrenador->id }}"
                        {{ $cliente->entrenador_id == $entrenador->id ? 'selected' : '' }}>
                        {{ $entrenador->nombre }}
                    </option>
                    @endforeach
                @else
                    @foreach($entrenadores as $entrenador)
                        <option
                        value="{{ $entrenador->id }}"
                            {{ $cliente->entrenador_id == $entrenador->id ? 'selected' : '' }}>
                            {{ $entrenador->nombre }}
                        </option>
                    @endforeach
                <option value="">Sin entrenador</option>
                @endif
            </select><br>
        </div>

        <div>
            <x-form-label>Membresía</x-form-label>
            <select name="membresia_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white outline-none transition-all">
                @foreach($membresias as $membresia)
                    <option value="{{ $membresia->id }}" 
                        {{ $cliente->membresia_id == $membresia->id ? 'selected' : '' }}>
                        {{ $membresia->nombre }} 
                    </option>
                @endforeach
            </select>
        </div>
        
        <div>
            <button type="submit" class=" bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-colors">Actualizar Cliente</button>
            <a href="{{ route('clientes.index') }}" class="bg-red-500 hover:bg-red-700 text-white px-6 py-2.5 rounded-lg shadow-md font-bold transition-color">Cancelar</a>
        </div>
    </form>
</div>

@endsection