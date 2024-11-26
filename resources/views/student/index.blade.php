@extends('layouts.invention')

@section('titulo', 'Listado de Estudiantes')

@section('contenido')
<h1>Estudiantes</h1>
<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Agregar Estudiante</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('reports.students.pdf') }}" class="btn btn-danger mb-3">Exportar a PDF</a>
<a href="{{ route('reports.students.csv') }}" class="btn btn-success mb-3">Exportar a CSV</a>

<!-- Filtros -->
<form action="{{ route('students.index') }}" method="GET" class="mb-3">
    <div class="row">
        <div class="col-md-4">
            <input type="text" name="name" class="form-control" placeholder="Buscar por nombre" value="{{ request('name') }}">
        </div>
        <div class="col-md-4">
            <select name="course_id" class="form-control">
                <option value="">Selecciona un curso</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Limpiar</a>
        </div>
    </div>
</form>

<!-- Tabla de estudiantes -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Cursos</th> <!-- Mostrar todos los cursos asociados -->
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    @foreach ($student->courses as $course)
                        {{ $course->name }}<br>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('students.show', $student) }}" class="btn btn-info">Detalles</a>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<!-- Paginación -->
<div class="d-flex justify-content-center">
    {{ $students->links() }}
</div>
@endsection
