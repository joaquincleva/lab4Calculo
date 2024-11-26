@extends('layouts.invention')

@section('contenido')
<h1>Cursos</h1>
<a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Crear Curso</a>

<form action="{{ route('courses.index') }}" method="GET" class="mb-3">
    <select name="subject_id" class="form-control">
        <option value="">Filtrar por Materia</option>
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                {{ $subject->name }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-secondary mt-2">Filtrar</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Materia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->name }}</td>
                <td>{{ $course->subject->name }}</td>
                <td>
                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $courses->links() }}
@endsection
