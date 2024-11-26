<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\Student;
use App\Models\Course;
use App\Models\Commission;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    public function index()
    {
        $courseStudents = CourseStudent::with(['student', 'course', 'commission'])->get();
        
        return view('course_student.index', compact('courseStudents'));
    }



    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();

        return view('course_student.create', compact('students', 'courses', 'commissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        $exists = CourseStudent::where('student_id', $request->student_id)
            ->where('course_id', $request->course_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'El estudiante ya está inscrito en este curso.');
        }

        CourseStudent::create($request->all());
        return redirect()->route('CourseStudents.index')->with('success', 'Inscripción creada exitosamente.');
    }

    public function edit(CourseStudent $courseStudent)
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();

        return view('course_student.edit', compact('courseStudent', 'students', 'courses', 'commissions'));
    }

    public function update(Request $request, CourseStudent $courseStudent)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        $courseStudent->update($request->all());
        return redirect()->route('CourseStudents.index')->with('success', 'Inscripción actualizada.');
    }

    public function destroy(CourseStudent $courseStudent)
    {
        $courseStudent->delete();
        return redirect()->route('CourseStudents.index')->with('success', 'Inscripción eliminada.');
    }
}
