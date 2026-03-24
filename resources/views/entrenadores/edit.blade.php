@extends('layouts.app')

@section('content')

<form action="{{ route('entrenadores.update', $entrenador->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ $entrenador->nombre }}" class="form-control"><br>
        @error('nombre') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Edad</label>
        <input type="number" name="edad" value="{{ $entrenador->edad }}" class="form-control"><br>
        @error('edad') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Especialidad</label>
        <input type="text" name="especialidad" value="{{ $entrenador->especialidad }}" class="form-control"><br>
        @error('especialidad') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="correo" value="{{ $entrenador->correo }}" class="form-control"><br>
        @error('correo') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Telefono</label>
        <input type="number" name="telefono" value="{{ $entrenador->telefono }}" class="form-control"><br>
        @error('telefono') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>    
    
    <button type="submit" class="btn btn-primary">Actualizar Entrenador</button>
    <a href="{{ route('entrenadores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection