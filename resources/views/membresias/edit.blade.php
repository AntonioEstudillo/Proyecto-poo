@extends('layouts.app')

@section('content')

<form action="{{ route('membresias.update', $membresia->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ $membresia->nombre}}" class="form-control"><br>
        @error('nombre') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" rows="5" cols="30" class="form-control">{{ $membresia->descripcion }}</textarea>
         @error('descripcion') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Duración</label>
        <input type="text" name="duracion" value="{{ $membresia->duracion }}" class="form-control"><br>
        @error('duracion') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" name="precio" value="{{ $membresia->precio }}" class="form-control"><br>
        @error('precio') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Membresia</button>
    <a href="{{ route('membresias.index') }}" class="btn btn-secondary">Cancelar</a>

</form>

@endsection
