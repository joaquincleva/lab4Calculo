@extends('layouts.invention')

@section('contenido')
<h1>Profesores</h1>
<a href="{{ route('professors.create') }}" class="btn btn-primary mb-3">Crear Profesor</a>


<a href="{{ route('reports.professors.pdf') }}" class="btn btn-danger mb-3">Exportar a PDF</a>
<a href="{{ route('reports.professors.csv') }}" class="btn btn-success mb-3">Exportar a CSV</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('professors.index') }}" method="GET" class="mb-3">
    <input type="text" name="name" class="form-control" placeholder="Buscar por nombre" value="{{ request('name') }}">
    <button type="submit" class="btn btn-secondary mt-2">Buscar</button>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Especialización</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($professors as $professor)
            <tr>
                <td>{{ $professor->name }}</td>
                <td>{{ $professor->specialization }}</td>
                <td>
                    <a href="{{ route('professors.show', $professor) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('professors.edit', $professor) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('professors.destroy', $professor) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este profesor?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $professors->links() }}
</div>
@endsection
