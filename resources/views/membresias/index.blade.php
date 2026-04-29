@extends('layouts.app')

@section('content')


<h1 class="text-3xl font-bold text-gray-800 mb-6">Membresias</h1>

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-900 text-white">
            <tr>
                <x-table-th>Nombre</x-table-th>
                <x-table-th>Precio</x-table-th>
                <x-table-th>Descripción</x-table-th>
                <x-table-th>Duración</x-table-th>
                <x-table-th></x-table-th>
                <x-table-th></x-table-th>
            </tr>
        </thead>

        <tbody>
            @foreach($membresias as $membresia)
                <tr>
                    <x-table-td>{{ $membresia->nombre}}</x-table-td>
                    <x-table-td>{{ $membresia->precio}}</x-table-td>
                    <x-table-td>{{ $membresia->descripcion}}</x-table-td>
                    <x-table-td>{{ $membresia->duracion}} días</x-table-td>
                    <x-table-td>
                        <a href="{{ route('membresias.edit', $membresia->id) }}" class="bg-amber-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow-sm text-sm transition-color">
                            Editar
                        </a>
                    </x-table-td>
                    <x-table-td>
                        <form action="{{ route('membresias.destroy', $membresia->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-500 hover:bg-red-700 px-3 py-1 rounded shadow-sm text-sm transition-colors" onclick="return confirm('¿Estás seguro de eliminar a este cliente?')">
                                Eliminar
                            </button>
                        </form>
                    </x-table-td>
                </tr>
            @endforeach


        </tbody>
    </table>
</div>

<div class="py-2">
    <a href="{{ route('membresias.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-all">
        Crear nueva membresia
    </a>
</div>

@endsection