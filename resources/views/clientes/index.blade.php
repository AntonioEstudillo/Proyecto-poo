@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-gray-800 mb-6">Clientes</h1> 
<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="w-full text-center border-collapse">
        <thead class="bg-gray-900 text-white">
            <tr>
                <x-table-th>Nombre</x-table-th>
                <x-table-th>Correo</x-table-th>
                <x-table-th>Membresía</x-table-th>
                <x-table-th>Entrenador</x-table-th>
                <x-table-th>Fecha de Inicio de Membresia</x-table-th>
                <x-table-th>Dias de membresia</x-table-th>
                <x-table-th></x-table-th>
                <x-table-th></x-table-th>
                <x-table-th></x-table-th>
            </tr>
        </thead>

        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <x-table-td>{{ $cliente->nombre }}</x-table-td>
                    <x-table-td>{{ $cliente->correo }}</x-table-td>
                    <x-table-td>{{ $cliente->membresia->nombre ?? 'Sin membresía activa' }}</x-table-td>
                    <x-table-td>{{ $cliente->entrenador->nombre ?? 'Sin entrenador' }}</x-table-td>
                    <x-table-td>{{ $cliente->fecha_registro->format('d/m/y')}}</x-table-td>

                    <x-table-td>
                        @php $restantes = $cliente->diasRestantes(); @endphp

                        @if(is_null($restantes))
                            <span class="px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-500 rounded-full">Sin datos</span>
                        @elseif($restantes === 'futuro')
                            <span class="px-2 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full">Inicia el {{ $cliente->fecha_registro->format('d/m/Y') }}</span>
                        @elseif($restantes > 0)
                            <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">Quedan {{ $restantes }} días</span>
                        @elseif($restantes == 0)
                            <span class="px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full">Vence hoy</span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">Vencido ({{ abs($restantes) }} d)</span>
                        @endif
                    </x-table-td>

                    <x-table-td>
                        @if($cliente->asistencia_hoy)
                            <span class="text-gray-400 text-sm font-medium italic" disabled>
                                Ya registrado
                            </span>
                        @else
                            <form method="POST" action="{{ route('asistencias.store') }}">
                                @csrf
                                <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">

                                <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1 rounded shadow-sm text-sm transition-colors">
                                    Registrar asistencia
                                </button>
                            </form>
                        @endif
                        </x-table-td>

                    <x-table-td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class=" bg-amber-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow-sm text-sm transition-color">
                            Editar
                        </a>
                    </x-table-td>
                    <x-table-td>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
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
    <a href="{{ route('clientes.create') }}" class=" inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-all">
        Registar Cliente
    </a>
</div>

<div class="mt-4">
    {{ $clientes->links() }}
</div>

@endsection