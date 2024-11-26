@extends('layouts.invention')

@section('contenido')
<h1>Detalles del Profesor</h1>

<div class="card">
    <div class="card-header">
        <h2>{{ $professor->name }}</h2>
    </div>
    <div class="card-body">
        <p><strong>Especialización:</strong> {{ $professor->specialization }}</p>

        <h5>Comisiones Asignadas:</h5>
        @if($professor->commissions->isEmpty())
            <p>No tiene comisiones asignadas.</p>
        @else
            <ul>
                @foreach ($professor->commissions as $commission)
                    <li>{{ $commission->aula }} - {{ $commission->horario }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<a href="{{ route('professors.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection
