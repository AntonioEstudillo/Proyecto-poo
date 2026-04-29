@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-gray-800 mb-6">Entrenadores</h1>

<div class="overflow-x-auto bg-white rounded-lg shadow">
<table class="w-full text-left border-collapse">
    <thead class="bg-gray-900 text-white">
        <tr>
            <x-table-th>Nombre</x-table-th>
            <x-table-th>Edad</x-table-th>
            <x-table-th>Especialidad</x-table-th>
            <x-table-th>Telefono</x-table-th>
            <x-table-th>Correo</x-table-th>
            <x-table-th></x-table-th>
            <x-table-th></x-table-th>
            
        </tr>
    </thead>

    <tbody>
        @foreach($entrenadores as $entrenador)
            <tr>
                <x-table-td>{{ $entrenador->nombre }}</x-table-td>
                <x-table-td>{{ $entrenador->edad }}</x-table-td>
                <x-table-td>{{ $entrenador->especialidad }}</x-table-td>
                <x-table-td>{{ $entrenador->telefono }}</x-table-td>
                <x-table-td>{{ $entrenador->correo }}</x-table-td>

                <x-table-td>
                    <a href="{{ route('entrenadores.edit', $entrenador->id) }}" class="bg-amber-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow-sm text-sm transition-color">
                        Editar
                    </a>
                </x-table-td>

                <x-table-td>
                    <form action="{{ route('entrenadores.destroy', $entrenador->id) }}" method="POST" style="display:inline;">
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

<div class="py-3">
    <a href="{{ route('entrenadores.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-all">
        Registar Entrenador
    </a>
</div>

<div class="mt-4">
    {{ $entrenadores->links() }}
</div>


@endsection