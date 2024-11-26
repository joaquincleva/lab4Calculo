@extends('layouts.invention')

@section('titulo', 'Editar Inscripción')

@section('contenido')
<h2>Editar Inscripción</h2>
<form action="{{ route('CourseStudents.update', $courseStudent->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="student_id">Estudiante:</label>
        <select id="student_id" name="student_id" class="form-control">
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ $courseStudent->student_id == $student->id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="course_id">Curso:</label>
        <select id="course_id" name="course_id" class="form-control">
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ $courseStudent->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="commission_id">Comisión:</label>
        <select id="commission_id" name="commission_id" class="form-control">
            @foreach($commissions as $commission)
                <option value="{{ $commission->id }}" {{ $courseStudent->commission_id == $commission->id ? 'selected' : '' }}>
                    {{ $commission->aula }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-warning mt-3">Actualizar</button>
</form>
<a href="{{ route('CourseStudents.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
