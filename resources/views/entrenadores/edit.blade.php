@extends('layouts.app')

@section('content')

<div max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100>
    <form action="{{ route('entrenadores.update', $entrenador->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <x-form-label>Nombre</x-form-label>
            <x-form-input type="text" name="nombre" value="{{ $entrenador->nombre }}" /><br>
            @error('nombre') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Edad</x-form-label>
            <x-form-input type="number" name="edad" value="{{ $entrenador->edad }}" /><br>
            @error('edad') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Especialidad</x-form-label>
            <x-form-input type="text" name="especialidad" value="{{ $entrenador->especialidad }}" /><br>
            @error('especialidad') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Correo</x-form-label>
            <x-form-input type="email" name="correo" value="{{ $entrenador->correo }}" /><br>
            @error('correo') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Telefono</x-form-label>
            <x-form-input type="number" name="telefono" value="{{ $entrenador->telefono }}" /><br>
            @error('telefono') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>    

        <div class="py-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-colors">Actualizar Entrenador</button>
            <a href="{{ route('entrenadores.index') }}" class="bg-red-500 hover:bg-red-700 text-white px-6 py-2.5 rounded-lg shadow-md font-bold transition-color">Cancelar</a>
        </div>
    </form>
</div>

@endsection