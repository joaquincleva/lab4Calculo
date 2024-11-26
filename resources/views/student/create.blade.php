@extends('layouts.invention')

@section('titulo', 'Crear Estudiante')

@section('contenido')
<h1>Crear Estudiante</h1>

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="course_id">Curso</label>
        <select name="course_id" class="form-control" required>
            <option value="">Selecciona un curso</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
</form>
@endsection
