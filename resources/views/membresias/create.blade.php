@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('membresias.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control"><br>
        @error('nombre') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" rows="5" cols="30" value="{{ old('descripcion') }}" class="form-control"></textarea>
         @error('descripcion') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Duración</label>
        <input type="text" name="duracion" value="{{ old('duracion') }}" class="form-control"><br>
        @error('duracion') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" name="precio" value="{{ old('precio') }}" class="form-control"><br>
        @error('precio') <small class="text-danger"> {{ $message }}</small> @enderror
    </div>

    
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="/membresias" class="btn btn-secondary">Cancelar</a>

</form>

@endsection