@extends('layouts.invention')

@section('contenido')
<h1>Crear Materia</h1>

<form action="{{ route('subjects.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nombre de la Materia</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Escribe el nombre de la materia">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
