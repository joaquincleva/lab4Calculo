<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
use App\Models\Course;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $commissions = Commission::query();

        if ($request->filled('course_id')) {
            $commissions->where('course_id', $request->course_id);
        }

        if ($request->filled('horario')) {
            $commissions->where('horario', $request->horario);
        }

        $commissions = $commissions->paginate(10);
        $courses = Course::all();

        return view('commission.index', compact('commissions', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('commission.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|date_format:H:i',
            'course_id' => 'required|exists:courses,id',
        ]);

        Commission::create($data);

        return redirect()->route('commissions.index')->with('success', 'Comisión creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {
        $commission->load('course');
        return view('commission.show', compact('commission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(Commission $commission)
    {
        $courses = Course::all();
        return view('commission.edit', compact('commission', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commission $commission)
    {
        $data = $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|date_format:H:i',
            'course_id' => 'required|exists:courses,id',
        ]);

        $commission->update($data);

        return redirect()->route('commissions.index')->with('success', 'Comisión actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        $commission->delete();
        return redirect()->route('commissions.index')->with('success', 'Comisión eliminada exitosamente.');
    }
}
