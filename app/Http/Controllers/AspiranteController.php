<?php

namespace App\Http\Controllers;

use App\Models\Aspirante;
use Illuminate\Http\Request;

class AspiranteController extends Controller
{
    public function index()
    {
        $aspirantes = Aspirante::all();
        return response()->json($aspirantes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'edad' => 'required|integer',
            'telefono' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:aspirantes,email',
            'servicio_interes' => 'required|string|max:255',
        ]);

        $aspirante = Aspirante::create($request->all());
        return response()->json($aspirante, 201);
    }

    public function show($id)
    {
        $aspirante = Aspirante::findOrFail($id);
        return response()->json($aspirante);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_completo' => 'sometimes|required|string|max:255',
            'edad' => 'sometimes|required|integer',
            'telefono' => 'sometimes|required|string|max:15',
            'email' => 'sometimes|required|string|email|max:255|unique:aspirantes,email,' . $id,
            'servicio_interes' => 'sometimes|required|string|max:255',
        ]);

        $aspirante = Aspirante::findOrFail($id);
        $aspirante->update($request->all());
        return response()->json($aspirante);
    }

    public function destroy($id)
    {
        $aspirante = Aspirante::findOrFail($id);
        $aspirante->delete();
        return response()->json(null, 204);
    }
}