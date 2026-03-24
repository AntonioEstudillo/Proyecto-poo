@extends('layouts.app')

@section('content')

<h1 class="mb-4">Clientes</h1>

<table class="table table-bourdered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Membresía</th>
            <th>Entrenador</th>
            <th>Fecha de Inicio de Membresia</th>
            <th>Dias de membresia</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->correo }}</td>
                <td>{{ $cliente->membresia->nombre ?? 'Sin membresía activa' }}</td>
                <td>{{ $cliente->entrenador->nombre ?? 'Sin entrenador' }}</td>
                <td>{{ $cliente->fecha_registro}}</td>

                <td>
                    @php $restantes = $cliente->diasRestantes(); @endphp

                    @if(is_null($restantes))
                        <span class="badge bg-secondary">Sin datos</span>
                        
                    @elseif($restantes === 'futuro')
                        <span class="badge bg-info text-dark">
                            Inicia el día {{ $cliente->fecha_registro->format('d/m/Y') }}
                        </span>

                    @elseif($restantes > 0)
                        <span class="badge bg-success">Quedan {{ $restantes }} días</span>

                    @elseif($restantes == 0)
                        <span class="badge bg-warning text-dark">Vence hoy</span>

                    @else
                        <span class="badge bg-danger">Vencido (hace {{ abs($restantes) }} días)</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">
                        Editar
                    </a>
                </td>
                <td>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar a este cliente?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

<a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">
    Registar Cliente
</a>


@endsection