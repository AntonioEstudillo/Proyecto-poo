@extends('layouts.app')

@section('content')


<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100">
    <form action="{{ route('membresias.update', $membresia->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <x-form-label class="form-label">Nombre</x-form-label>
            <x-form-input type="text" name="nombre" value="{{ $membresia->nombre}}" />
            @error('nombre') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label>Descripción</x-form-label>
            <textarea name="descripcion" rows="5" cols="30" class="form-control">{{ $membresia->descripcion }}</textarea>
            @error('descripcion') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label class="form-label">Duración</x-form-label>
            <x-form-input type="text" name="duracion" value="{{ $membresia->duracion }}" />
            @error('duracion') <small class="text-red-500"> {{ $message }}</small> @enderror
        </div>

        <div>
            <x-form-label class="form-label">Precio</x-form-label>
            <x-form-input type="number" name="precio" value="{{ $membresia->precio }}" />
            @error('precio') <small class="text-danger"> {{ $message }}</small> @enderror
        </div>

        <div class="py-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-colors">Actualizar Membresia</button>
            <a href="{{ route('membresias.index') }}" class="bg-red-500 hover:bg-red-700 text-white px-6 py-2.5 rounded-lg shadow-md font-bold transition-color">Cancelar</a>
        </div>

    </form>
</div>

@endsection
