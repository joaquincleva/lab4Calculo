@extends('layouts.invention')

@section('contenido')
<h1>Editar Profesor</h1>

<form action="{{ route('professors.update', $professor) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nombre del Profesor</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $professor->name) }}" placeholder="Escribe el nombre del profesor">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="specialization">Especialización</label>
        <input type="text" name="specialization" class="form-control" value="{{ old('specialization', $professor->specialization) }}" placeholder="Escribe la especialización del profesor">
        @error('specialization')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('professors.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
