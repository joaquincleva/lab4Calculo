@extends('layouts.invention')

@section('contenido')
<h1>Editar Materia</h1>

<form action="{{ route('subjects.update', $subject) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nombre de la Materia</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $subject->name) }}" placeholder="Escribe el nombre de la materia">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
