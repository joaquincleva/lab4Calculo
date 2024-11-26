<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Sistema Escolar')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Sistema Escolar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('students.index') }}">Estudiantes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('subjects.index') }}">Materias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Cursos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('commissions.index') }}">Comisiones</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('professors.index') }}">Profesores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('CourseStudents.index') }}">Inscripciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('calculate.form') }}">Cálculo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contacto') }}">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5 pt-5">
        @yield('contenido') <!-- Aquí va el contenido dinámico de cada vista -->
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5 py-3">
        <div class="container text-center">
            <p>© 2024 Sistema Escolar | <a href="mailto:info@yourcompany.com" class="text-white">info@SistemaDeGestion.com</a></p>
            <p><a href="http://validator.w3.org/check?uri=referer" target="_blank" class="text-white">Valid XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank" class="text-white">CSS</a></p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
