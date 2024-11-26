@extends('layouts.invention')

@section('contenido')
<h1>Comisiones</h1>
<a href="{{ route('commissions.create') }}" class="btn btn-primary mb-3">Crear Comisión</a>


<a href="{{ route('reports.commissions.pdf') }}" class="btn btn-danger mb-3">Exportar a PDF</a>
<a href="{{ route('reports.commissions.csv') }}" class="btn btn-success mb-3">Exportar a CSV</a>

<form action="{{ route('commissions.index') }}" method="GET" class="mb-3">
    <div class="form-row">
        <div class="col">
            <select name="course_id" class="form-control">
                <option value="">Filtrar por Curso</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <input type="time" name="horario" class="form-control" value="{{ request('horario') }}">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-secondary">Filtrar</button>
        </div>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th>Aula</th>
            <th>Horario</th>
            <th>Curso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($commissions as $commission)
            <tr>
                <td>{{ $commission->aula }}</td>
                <td>{{ $commission->horario }}</td>
                <td>{{ $commission->course->name }}</td>
                <td>
                    <a href="{{ route('commissions.edit', $commission) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('commissions.destroy', $commission) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta comisión?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $commissions->links() }}
</div>
@endsection
