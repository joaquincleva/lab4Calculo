@extends('layouts.invention')

@section('titulo', 'Detalles de la Materia')

@section('contenido')
<h1>Detalles de la Materia</h1>

<div class="card">
    <div class="card-header">
        <h2>{{ $subject->name }}</h2>
    </div>
    <div class="card-body">
        <h5>Cursos asociados:</h5>
        @if($subject->courses->isEmpty())
            <p>No hay cursos asociados a esta materia.</p>
        @else
            <ul>
                @foreach($subject->courses as $course)
                    <li>{{ $course->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<a href="{{ route('subjects.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection
