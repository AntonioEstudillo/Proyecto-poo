@extends('layouts.app')

@section('content')


<h1 class="mb-4">Membresias</h1>

<table class="table table-bourdered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Duración</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($membresias as $membresia)
            <tr>
                <td>{{ $membresia->nombre}}</td>
                <td>{{ $membresia->precio}}</td>
                <td>{{ $membresia->descripcion}}</td>
                <td>{{ $membresia->duracion}} días</td>
                <td>
                    <a href="{{ route('membresias.edit', $membresia->id) }}" class="btn btn-warning">
                        Editar
                    </a>
                </td>
                <td>
                    <form action="{{ route('membresias.destroy', $membresia->id) }}" method="POST" style="display:inline;">
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

<a href="{{ route('membresias.create') }}" class="btn btn-primary mb-3">
    Crear nueva membresia
</a>

@endsection