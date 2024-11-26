<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Commission;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $professors = Professor::query();

        if ($request->filled('name')) {
            $professors->where('name', 'like', '%' . $request->name . '%');
        }

        $professors = $professors->paginate(10);
        return view('professors.index', compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('professors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        Professor::create($data);

        return redirect()->route('professors.index')->with('success', 'Profesor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\View\View
     */
    public function show(Professor $professor)
    {
        $professor->load('commissions');
        return view('professors.show', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\View\View
     */
    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Professor $professor)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'specialization' => 'sometimes|string|max:255',
        ]);

        $professor->update($data);

        return redirect()->route('professors.index')->with('success', 'Profesor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Professor $professor)
    {
        if ($professor->commissions()->exists()) {
            return redirect()->route('professors.index')->with('error', 'No se puede eliminar el profesor porque está asignado a comisiones.');
        }

        $professor->delete();

        return redirect()->route('professors.index')->with('success', 'Profesor eliminado exitosamente.');
    }
}
