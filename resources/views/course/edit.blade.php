@extends('layouts.invention')

@section('contenido')
<h1>{{ isset($course) ? 'Editar Curso' : 'Crear Curso' }}</h1>

<form action="{{ isset($course) ? route('courses.update', $course) : route('courses.store') }}" method="POST">
    @csrf
    @if(isset($course))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Nombre del Curso</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $course->name ?? '') }}">
    </div>

    <div class="form-group">
        <label for="subject_id">Materia</label>
        <select name="subject_id" class="form-control">
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ (old('subject_id', $course->subject_id ?? '') == $subject->id) ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($course) ? 'Actualizar' : 'Crear' }}</button>
</form>
@endsection
