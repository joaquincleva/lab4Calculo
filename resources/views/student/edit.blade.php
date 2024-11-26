@extends('layouts.invention')

@section('titulo', 'Editar Estudiante')

@section('contenido')
<h1>Editar Estudiante</h1>

<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
    </div>

    <div class="form-group">
        <label for="course_id">Curso</label>
        <select name="course_id" class="form-control" required>
            <option value="">Selecciona un curso</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
</form>
@endsection
