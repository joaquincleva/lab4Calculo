<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\ReportController;


// Ruta de inicio
Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas para cálculo
Route::get('/calculate', [CalculationController::class, 'showForm'])->name('calculate.form');
Route::post('/calculate', [CalculationController::class, 'calculate'])->name('calculate.result');

// Rutas para estudiantes
Route::resource('students', StudentController::class);

// Rutas para materias
Route::resource('subjects', SubjectController::class);

// Rutas para cursos
Route::resource('courses', CourseController::class);

// Rutas para comisiones
Route::resource('commissions', CommissionController::class);

// Rutas para profesores
Route::resource('professors', ProfessorController::class);

// Rutas para inscripciones de estudiantes
Route::resource('CourseStudents', CourseStudentController::class);

// Ruta para contacto
Route::get('/contacto', function () {
    return view('nueva_vista.contacto');
})->name('contacto');

// Ruta para el blog
Route::get('/blog', function () {
    return view('nueva_vista.blog');
})->name('blog');

// Rutas de pruebas (opcional, para desarrollo y depuración)
Route::get('/create-student', function () {
    $student = new \App\Models\Student();
    $student->name = 'Mariano Espinoza';
    $student->email = 'mariano.espinoza@example.com';
    $student->save();
    return 'Estudiante creado exitosamente';
});

Route::get('/create-course', function () {
    $course = new \App\Models\Course();
    $course->name = 'Programación';
    $course->save();
    return 'Curso creado exitosamente';
});

Route::get('/add-student-to-course/{student_id}/{course_id}', function ($student_id, $course_id) {
    $student = \App\Models\Student::find($student_id);
    $course = \App\Models\Course::find($course_id);

    if ($student && $course) {
        $student->courses()->attach($course);
        return "El estudiante ha sido agregado al curso.";
    } else {
        return "El estudiante o el curso no se encontraron.";
    }
});

// Rutas de consultas específicas
Route::prefix('consultas')->group(function () {
    Route::get('/materias', [ConsultasController::class, 'listarMaterias'])->name('consultas.materias');
    Route::get('/materias2', [ConsultasController::class, 'listarMaterias2'])->name('consultas.materias2');
    Route::get('/filtrar-alumnos', [ConsultasController::class, 'FiltrarAlumnos'])->name('consultas.filtrarAlumnos');
    Route::get('/alumnos', [ConsultasController::class, 'Alumnos'])->name('consultas.alumnos');
    Route::get('/cursos', [ConsultasController::class, 'cursos'])->name('consultas.cursos');
    Route::get('/alumnos-del-curso', [ConsultasController::class, 'alumnos_del_curso'])->name('consultas.alumnosDelCurso');
    Route::get('/curso-materia', [ConsultasController::class, 'curso_materia'])->name('consultas.cursoMateria');
    Route::get('/cursos-con-mas-de-tres-estudiantes', [ConsultasController::class, 'CursosConMasDeTresEstudiantes'])->name('consultas.cursosMasTres');
    Route::get('/profesores-especializacion', [ConsultasController::class, 'ProfesoresEspecializacion'])->name('consultas.profesoresEspecializacion');
    Route::get('/entre-fechas', [ConsultasController::class, 'EntreFechas'])->name('consultas.entreFechas');
    Route::get('/nuevo-estudiante-pedro', [ConsultasController::class, 'NuevoEstudiante_Pedro'])->name('consultas.nuevoEstudiante');
    Route::get('/filtro-estudiantes-2', [ConsultasController::class, 'FiltroEstudiantes_2'])->name('consultas.filtroEstudiantes');
});

Route::get('/reports/courses-by-subject/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');
Route::get('/reports/courses-by-subject/csv', [ReportController::class, 'exportCsv'])->name('reports.csv');

Route::get('/reports/students/pdf', [ReportController::class, 'exportStudentsPdf'])->name('reports.students.pdf');
Route::get('/reports/students/csv', [ReportController::class, 'exportStudentsCsv'])->name('reports.students.csv');

Route::get('/reports/commissions/pdf', [ReportController::class, 'exportCommissionsPdf'])->name('reports.commissions.pdf');
Route::get('/reports/commissions/csv', [ReportController::class, 'exportCommissionsCsv'])->name('reports.commissions.csv');

Route::get('/reports/professors/pdf', [ReportController::class, 'exportProfessorsPdf'])->name('reports.professors.pdf');
Route::get('/reports/professors/csv', [ReportController::class, 'exportProfessorsCsv'])->name('reports.professors.csv');