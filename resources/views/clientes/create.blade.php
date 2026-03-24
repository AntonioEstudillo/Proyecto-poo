@extends('layouts.app')

@section('content')

<h1 class="mb-4">Crear Cliente</h1>

<form method="POST" action="{{ route('clientes.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control"><br>
        @error('nombre') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="correo"value="{{ old('correo') }}" class="form-control"><br>
        @error('correo') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control"><br>
        @error('telefono') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha Registro</label>
        <input type="date" name="fecha_registro" value="{{ old('fecha_registro') }}" class="form-control"><br>
        @error('fecha_registro') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Membresía</label>
        <select name="membresia_id" class="form-select">
            @foreach($membresias as $membresia)
                <option value="{{ $membresia->id }}">{{ $membresia->nombre }}</option>
            @endforeach
        </select><br>
    </div>

    <div class="mb-3">
        <label class="form-label">Entrenador</label>
        <select name="entrenador_id" class="form-select">
            <option value="">Sin entrenador</option>
            @foreach($entrenadores as $entrenador)
                <option value="{{ $entrenador->id }}">{{ $entrenador->nombre }}</option>
            @endforeach
        </select><br>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="/clientes" class="btn btn-secondary">Cancelar</a>
</form>

@endsection