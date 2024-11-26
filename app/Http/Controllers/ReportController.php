<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Commission;
use PDF;

class ReportController extends Controller
{
    public function exportPdf()
    {
        $subjects = Subject::with('courses')->get();

        $pdf = PDF::loadView('reports.courses_by_subject_pdf', compact('subjects'));
        return $pdf->download('reporte_cursos_por_materia.pdf');
    }

    public function exportCsv()
    {
        $subjects = Subject::with('courses')->get();

        $filename = 'reporte_cursos_por_materia.csv';
        $handle = fopen($filename, 'w');
        fputcsv($handle, ['Materia', 'Curso']);

        foreach ($subjects as $subject) {
            foreach ($subject->courses as $course) {
                fputcsv($handle, [$subject->name, $course->name]);
            }
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }

    public function exportStudentsPdf()
    {
        $students = Student::with(['courses', 'courses.commissions'])->get();

        $pdfView = view('reports.students_pdf', compact('students'))->render();

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($pdfView);

        return $pdf->download('reporte_estudiantes_inscritos.pdf');
    }

    public function exportStudentsCsv()
    {
        $students = Student::with(['courses', 'courses.commissions'])->get();

        $filename = 'reporte_estudiantes_inscritos.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($students) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['Nombre del Estudiante', 'Email', 'Cursos', 'Comisiones']);

            foreach ($students as $student) {
                $courses = $student->courses->pluck('name')->join(', ');
                $commissions = $student->courses->flatMap(fn($course) => $course->commissions->pluck('name'))->join(', ');

                fputcsv($file, [$student->name, $student->email, $courses, $commissions]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportCommissionsPdf()
    {
        $commissionsData = Commission::with('course')->get();

        $data = $commissionsData->map(function ($commission) {
            return [
                'Aula' => $commission->aula,
                'Horario' => $commission->horario,
                'Curso' => $commission->course->name,
            ];
        });

        $pdf = \PDF::loadView('reports.commissions_pdf', compact('data'));
        return $pdf->download('commissions_report.pdf');
    }

    public function exportCommissionsCsv()
    {
        $commissions = Commission::with(['course'])->get();

        $csvData = "Aula,Horario,Curso,Profesor\n";

        foreach ($commissions as $commission) {
            $csvData .= implode(',', [
                $commission->aula,
                $commission->horario,
                $commission->course->name,
            ]) . "\n";
        }

        $filename = "reporte_comisiones_" . date('Ymd_His') . ".csv";

        return response($csvData)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename={$filename}");
    }

    public function exportProfessorsPdf()
    {
        $data = Professor::select('name', 'specialization')->get();

        $pdf = \PDF::loadView('reports.professors_pdf', compact('data'));
        return $pdf->download('professors_report.pdf');
    }

    public function exportProfessorsCsv()
{
    $professors = Professor::select('name', 'specialization')->get();

    $csvData = "Nombre,Especialización\n";

    foreach ($professors as $professor) {
        $csvData .= implode(',', [
            $professor->name,
            $professor->specialization,
        ]) . "\n";
    }

    $filename = "reporte_profesores_" . date('Ymd_His') . ".csv";

    return response($csvData)
        ->header('Content-Type', 'text/csv')
        ->header('Content-Disposition', "attachment; filename={$filename}");
}
    
}
