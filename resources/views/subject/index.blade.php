@extends('layouts.invention')

@section('contenido')
<h1>Materias</h1>
<a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">Crear Materia</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif


<a href="{{ route('reports.pdf') }}" class="btn btn-danger mb-3">Exportar a PDF</a>
<a href="{{ route('reports.csv') }}" class="btn btn-success mb-3">Exportar a CSV</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>
                    <a href="{{ route('subjects.show', $subject) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('subjects.destroy', $subject) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta materia?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $subjects->links() }} <!-- Paginación -->
</div>
@endsection
