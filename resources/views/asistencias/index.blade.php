@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-gray-800 mb-6">Asistencias</h1>

<div class="overflow-x-auto rounded-lg shadow">

<div class="bg-gray-900 p-4">
    <form method="GET" class="flex items-center gap-2">
        <input type="date" name="fecha" value="{{ $fecha }}" 
               class="px-3 py-2 bg-gray-800 text-white border border-gray-700 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
        
        <button class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
           Buscar
            <i class="fa-solid fa-magnifying-glass" style="color: rgb(255, 255, 255);"></i>
        </button>
    </form>
</div>

<table class="w-full text-left border-collapse">
    <thead class="bg-gray-900 text-white">
        <tr>
            <x-table-th>Nombre</x-table-th>
            <x-table-th>Tipo</x-table-th> <x-table-th>Hora</x-table-th>
        </tr>
    </thead>

    <tbody>
        @foreach($asistencias as $asistencia)
        <tr class="border-b border-gray-200 hover:bg-gray-50">
            <x-table-td>{{ $asistencia->asistible->nombre }}</x-table-td>
            
            <x-table-td>
                @if($asistencia->asistible instanceof \App\Models\Cliente)
                    <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                        Cliente
                    </span>
                @elseif($asistencia->asistible instanceof \App\Models\Entrenador)
                    <span class="px-2 py-1 text-xs font-semibold bg-purple-100 text-purple-700 rounded-full">
                        Entrenador
                    </span>
                @else
                    <span class="px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-700 rounded-full">
                        Otro
                    </span>
                @endif
            </x-table-td>

            <x-table-td>{{ \Carbon\Carbon::parse($asistencia->fecha)->format('H:i') }}</x-table-td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

@endsection