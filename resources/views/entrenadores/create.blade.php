@extends('layouts.app')

@section('content')


<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100">
    <form method="POST" action="{{ route('entrenadores.store') }}">
        @csrf
        <div >
            <x-form-label>Nombre</x-form-label>
            <x-form-input type="text" name="nombre" value="{{ old('nombre') }}" /><br>
            @error('nombre') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Edad</x-form-label>
            <x-form-input type="number" name="edad" value="{{ old('edad') }}" /><br>
            @error('edad') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Especialidad</x-form-label>
            <x-form-input type="text" name="especialidad" value="{{ old('especialidad') }}" /><br>
            @error('especialidad') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Correo</x-form-label>
            <x-form-input type="email" name="correo" value="{{ old('correo') }}" /><br>
            @error('correo') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Telefono</x-form-label>
            <x-form-input type="number" name="telefono" value="{{ old('telefono') }}" /><br>
            @error('telefono') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div class="py-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-colors">Guardar</button>
            <a href="/entrenadores" class=" bg-red-500 hover:bg-red-700 text-white px-6 py-2.5 rounded-lg shadow-md font-bold transition-color">Cancelar</a>
        </div>
    </form>
</div>

@endsection