@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('entrenadores.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control"><br>
        @error('nombre') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Edad</label>
        <input type="number" name="edad" value="{{ old('edad') }}" class="form-control"><br>
        @error('edad') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Especialidad</label>
        <input type="text" name="especialidad" value="{{ old('especialidad') }}" class="form-control"><br>
        @error('especialidad') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="correo" value="{{ old('correo') }}" class="form-control"><br>
        @error('correo') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Telefono</label>
        <input type="number" name="telefono" value="{{ old('telefono') }}" class="form-control"><br>
        @error('telefono') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="/entrenadores" class="btn btn-secondary">Cancelar</a>

</form>

@endsection