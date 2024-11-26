@extends('layouts.invention')

@section('titulo', 'Nueva Inscripción')

@section('contenido')
<h2>Crear Inscripción</h2>
<form action="{{ route('CourseStudents.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="student_id">Estudiante:</label>
        <select id="student_id" name="student_id" class="form-control">
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="course_id">Curso:</label>
        <select id="course_id" name="course_id" class="form-control">
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="commission_id">Comisión:</label>
        <select id="commission_id" name="commission_id" class="form-control">
            @foreach($commissions as $commission)
                <option value="{{ $commission->id }}">{{ $commission->aula }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
</form>
@endsection
