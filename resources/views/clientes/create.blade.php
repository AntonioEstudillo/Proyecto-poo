@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100">
    <form method="POST" action="{{ route('clientes.store') }}">
        @csrf

        <div>
            <x-form-label>Nombre</x-form-label>
            <x-form-input type="text" name="nombre" value="{{ old('nombre') }}" />
            @error('nombre') <small class="text-danger"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Correo</x-form-label>
            <input type="email" name="correo"value="{{ old('correo') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
            @error('correo') <small class="text-danger"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Teléfono</x-form-label>
            <x-form-input type="text" name="telefono" value="{{ old('telefono') }}" />
            @error('telefono') <small class="text-danger"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Fecha Registro</x-form-label>
            <x-form-input type="date" name="fecha_registro" value="{{ old('fecha_registro') }}" />
            @error('fecha_registro') <small class="text-danger"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Membresía</x-form-label>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white outline-none transition-all>" 
                name="membresia_id">
                @foreach($membresias as $membresia)
                    <option value="{{ $membresia->id }}">{{ $membresia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <x-form-label>Entrenador</x-form-label>
            <select name="entrenador_id" 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white outline-none transition-all">
                <option value="">Sin entrenador</option>
                @foreach($entrenadores as $entrenador)
                    <option value="{{ $entrenador->id }}">{{ $entrenador->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="py-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-colors">Guardar</button>
            <a href="/clientes" class="bg-red-500 hover:bg-red-700 text-white px-6 py-2.5 rounded-lg shadow-md font-bold transition-color">Cancelar</a>
        </div>
    </form>
</div>

@endsection