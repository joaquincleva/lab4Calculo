<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Commission;

class StudentController extends Controller
{
    /**
     * Listar estudiantes con filtros.
     */
    public function index(Request $request)
    {
        $students = Student::query();

        if ($request->filled('name')) {
            $students->where('students.name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('course_id')) {
            $students->whereHas('courses', function ($query) use ($request) {
                $query->where('courses.id', $request->course_id);
            });
        }

        $students = $students->with('courses')->paginate(10);
        $courses = Course::all();

        return view('student.index', compact('students', 'courses'));
    }



    /**
     * Mostrar el formulario de creación.
     */
    public function create()
    {
        $courses = Course::all();
        return view('student.create', compact('courses'));
    }

    /**
     * Guardar un nuevo estudiante.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'course_id' => $data['course_id'],
        ]);

        return redirect()->route('students.index')->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Mostrar detalles de un estudiante.
     */
    public function show(Student $student)
    {
        $student->load('course');
        return view('student.show', compact('student'));
    }

    /**
     * Mostrar el formulario de edición.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('student.edit', compact('student', 'courses'));
    }

    /**
     * Actualizar un estudiante.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course_id' => 'required|exists:courses,id',
        ]);

        $student->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'course_id' => $data['course_id'],
        ]);

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Eliminar un estudiante.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
