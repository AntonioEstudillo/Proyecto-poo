@extends('layouts.app')

@section('content')

<form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}">
    </div>

    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="correo" class="form-control" value="{{ $cliente->correo }}">
    </div>

    <div class="mb-3">
        <label>Fecha de Registro</label>
        <input type="date" name="fecha_registro" class="form-control" 
               value="{{ $cliente->fecha_registro->format('Y-m-d') }}">
    </div>

    <div class="mb-3">
        <label>Entrenador</label>
        <select name="entrenador_id" class="form-control">
            @if ($cliente->entrenador_id == null)
            <option value="">Sin entrenador</option>
                @foreach($entrenadores as $entrenador)
                <option value="{{ $entrenador->id }}"
                    {{ $cliente->entrenador_id == $entrenador->id ? 'selected' : '' }}>
                    {{ $entrenador->nombre }}
                </option>
            @endforeach
            @else
            @foreach($entrenadores as $entrenador)
                <option value="{{ $entrenador->id }}"
                    {{ $cliente->entrenador_id == $entrenador->id ? 'selected' : '' }}>
                    {{ $entrenador->nombre }}
                </option>
            @endforeach
            <option value="">Sin entrenador</option>
            @endif
        </select><br>
    </div>

    <div class="mb-3">
        <label>Membresía</label>
        <select name="membresia_id" class="form-control">
            @foreach($membresias as $membresia)
                <option value="{{ $membresia->id }}" 
                    {{ $cliente->membresia_id == $membresia->id ? 'selected' : '' }}>
                    {{ $membresia->nombre }} 
                </option>
            @endforeach
        </select>
    </div>
    

    <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection