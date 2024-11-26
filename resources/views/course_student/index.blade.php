@extends('layouts.invention')

@section('titulo', 'Listado de Inscripciones')

@section('contenido')
<h1>Inscripciones</h1>
@if($courseStudents->isEmpty())
    <p>No hay inscripciones disponibles.</p>
@else
    <a href="{{ route('CourseStudents.create') }}" class="btn btn-primary mb-3">Nueva Inscripción</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Comisión</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courseStudents as $courseStudent)
                <tr>
                    <td>{{ $courseStudent->student->name }}</td>
                    <td>{{ $courseStudent->course->name }}</td>
                    <td>{{ $courseStudent->commission->aula ?? 'Sin comisión' }}</td>
                    <td>
                        <!-- Botón para editar -->
                        <a href="{{ route('CourseStudents.edit', $courseStudent->id) }}" class="btn btn-warning">Editar</a>

                        <!-- Formulario para eliminar -->
                        <form action="{{ route('CourseStudents.destroy', $courseStudent->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta inscripción?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>    
    </table>
@endif
@endsection
