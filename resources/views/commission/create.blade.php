@extends('layouts.invention')

@section('contenido')
<h1>{{ isset($commission) ? 'Editar Comisión' : 'Crear Comisión' }}</h1>

<form action="{{ isset($commission) ? route('commissions.update', $commission) : route('commissions.store') }}" method="POST">
    @csrf
    @if(isset($commission))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="aula">Aula</label>
        <input type="text" name="aula" class="form-control" value="{{ old('aula', $commission->aula ?? '') }}" placeholder="Escribe el aula">
    </div>

    <div class="form-group">
        <label for="horario">Horario</label>
        <input type="time" name="horario" class="form-control" value="{{ old('horario', $commission->horario ?? '') }}">
    </div>

    <div class="form-group">
        <label for="course_id">Curso</label>
        <select name="course_id" class="form-control">
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ old('course_id', $commission->course_id ?? '') == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($commission) ? 'Actualizar' : 'Guardar' }}</button>
    <a href="{{ route('commissions.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
