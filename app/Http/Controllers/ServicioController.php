<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::orderBy('orden')->get(); // Ordenar por el campo orden
        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'requiere_programas' => 'required|boolean',
            'orden' => 'nullable|integer', 
        ]);

        $servicio = Servicio::create($request->all());
        return redirect()->route('servicios.index');
    }

    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('servicios.show', compact('servicio'));
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'requiere_programas' => 'required|boolean',
            'orden' => 'nullable|integer', // Validar el campo orden
        ]);

        $servicio = Servicio::findOrFail($id);
        $servicio->update($request->all());
        return redirect()->route('servicios.index');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        return redirect()->route('servicios.index');
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');

        foreach ($order as $index => $id) {
            Servicio::where('id', $id)->update(['orden' => $index + 1]);
        }

        return response()->json(['success' => 'Orden actualizado correctamente.']);
    }
}
