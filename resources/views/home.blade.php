@extends('layouts.invention')

@section('titulo', 'Inicio - Sistema de Gestión Escolar')

@section('contenido')
<div class="text-center my-5">
    <h1>Bienvenido al Sistema de Gestión Escolar</h1>
    <p class="lead">Una herramienta integral para gestionar estudiantes, cursos, materias, comisiones, profesores e inscripciones de manera eficiente.</p>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header bg-primary text-white text-center">
                <h3>¿Qué es este sistema?</h3>
            </div>
            <div class="card-body">
                <p>El Sistema de Gestión Escolar es una plataforma diseñada para facilitar la administración de escuelas o instituciones educativas. Permite gestionar información clave como:</p>
                <ul>
                    <li>Estudiantes y sus datos personales.</li>
                    <li>Cursos, materias y comisiones asociadas.</li>
                    <li>Profesores y sus especializaciones.</li>
                    <li>Inscripciones de estudiantes a cursos y comisiones.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header bg-success text-white text-center">
                <h3>Principales funcionalidades</h3>
            </div>
            <div class="card-body">
                <ul>
                    <li>CRUD completo para estudiantes, materias, cursos, comisiones y profesores.</li>
                    <li>Búsqueda y filtrado de estudiantes por cursos o materias.</li>
                    <li>Gestión de inscripciones con validaciones.</li>
                    <li>Generación de informes y estadísticas educativas.</li>
                    <li>Interfaz amigable y optimizada para la gestión escolar.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header bg-info text-white text-center">
                <h3>Beneficios</h3>
            </div>
            <div class="card-body">
                <ul>
                    <li>Reducción del tiempo necesario para gestionar información.</li>
                    <li>Acceso centralizado y seguro a los datos escolares.</li>
                    <li>Mayor eficiencia en la asignación de cursos y comisiones.</li>
                    <li>Mejora de la comunicación entre estudiantes, profesores y administración.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-5">
    <h2>¡Comienza a explorar las secciones del sistema!</h2>
    <p>Utiliza el menú de navegación superior para acceder a todas las funcionalidades del sistema.</p>
    <a href="{{ route('students.index') }}" class="btn btn-primary btn-lg">Ver Estudiantes</a>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-lg">Ver Cursos</a>
</div>
@endsection
