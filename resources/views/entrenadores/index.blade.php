@extends('layouts.app')

@section('content')

<h1 class="mb-4">Entrenadores</h1>

<table class="table table-bourdered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Especialidad</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th></th>
            <th></th>
            
            
        </tr>
    </thead>

    <tbody>
        @foreach($entrenadores as $entrenador)
            <tr>
                <td>{{ $entrenador->nombre }}</td>
                <td>{{ $entrenador->edad }}</td>
                <td>{{ $entrenador->especialidad }}</td>
                <td>{{ $entrenador->telefono }}</td>
                <td>{{ $entrenador->correo }}</td>

                <td>
                    <a href="{{ route('entrenadores.edit', $entrenador->id) }}" class="btn btn-warning">
                        Editar
                    </a>
                </td>

                <td>
                    <form action="{{ route('entrenadores.destroy', $entrenador->id) }}" method="POST" style="display:inline;">
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

<a href="{{ route('entrenadores.create') }}" class="btn btn-primary mb-3">
    Registar Entrenador
</a>

@endsection