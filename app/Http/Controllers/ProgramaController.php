<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function index()
    {
        $programas = Programa::all();
        return view('programas.index', compact('programas'));
    }

    public function create()
    {
        $servicios = Servicio::where('requiere_programas', true)->get();
        return view('programas.create', compact('servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'servicio_id' => 'required|exists:servicios,id',
        ]);

        $programa = Programa::create($request->only(['nombre', 'descripcion']));
        $programa->servicios()->attach($request->servicio_id);

        return redirect()->route('programas.index');
    }

    public function show($id)
    {
        $programa = Programa::findOrFail($id);
        return view('programas.show', compact('programa'));
    }

    public function edit($id)
    {
        $programa = Programa::findOrFail($id);
        $servicios = Servicio::where('requiere_programas', true)->get();
        return view('programas.edit', compact('programa', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'servicio_id' => 'required|exists:servicios,id',
        ]);

        $programa = Programa::findOrFail($id);
        $programa->update($request->only(['nombre', 'descripcion']));
        $programa->servicios()->sync($request->servicio_id);

        return redirect()->route('programas.index');
    }

    public function destroy($id)
    {
        $programa = Programa::findOrFail($id);
        $programa->delete();
        return redirect()->route('programas.index');
    }
}
