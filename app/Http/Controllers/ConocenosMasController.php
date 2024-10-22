<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConocenosMas;
use Illuminate\Support\Facades\Storage;

class ConocenosMasController extends Controller
{
    private function uploadToLocal($file, $name)
    {
        $path = $file->storeAs('public/files', $name);
        return Storage::url($path);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mision' => 'required|string',
            'vision' => 'required|string',
            'valores' => 'required|string',
            'objetivo' => 'required|string',
            'img1' => 'nullable|file',
            'img2' => 'nullable|file',
            'img3' => 'nullable|file',
            'img4' => 'nullable|file',
        ]);

        try {
            foreach (['img1', 'img2', 'img3', 'img4'] as $imgField) {
                if ($request->hasFile($imgField)) {
                    $data[$imgField] = $this->uploadToLocal($request->file($imgField), $imgField . '_' . time() . '.' . $request->file($imgField)->getClientOriginalExtension());
                }
            }

            $item = ConocenosMas::create($data);
            return redirect()->route('conocenos_mas.index')->with('success', 'Registro creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function index()
    {
        $items = ConocenosMas::all();
        return view('conocenos_mas.index', compact('items'));
    }

    // Método para la vista del administrador
    public function show($id)
    {
        $item = ConocenosMas::findOrFail($id);
        return view('conocenos_mas.show', compact('item'));
    }

    public function create()
    {
        return view('conocenos_mas.create');
    }

    public function edit($id)
    {
        $item = ConocenosMas::findOrFail($id);
        return view('conocenos_mas.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'mision' => 'required|string',
            'vision' => 'required|string',
            'valores' => 'required|string',
            'objetivo' => 'required|string',
            'img1' => 'nullable|file',
            'img2' => 'nullable|file',
            'img3' => 'nullable|file',
            'img4' => 'nullable|file',
        ]);

        try {
            $item = ConocenosMas::findOrFail($id);

            foreach (['img1', 'img2', 'img3', 'img4'] as $imgField) {
                if ($request->hasFile($imgField)) {
                    // Eliminar la imagen anterior si existe
                    if ($item->$imgField) {
                        Storage::delete(str_replace('/storage', 'public', $item->$imgField));
                    }

                    // Subir la nueva imagen
                    $data[$imgField] = $this->uploadToLocal($request->file($imgField), $imgField . '_' . time() . '.' . $request->file($imgField)->getClientOriginalExtension());
                }
            }

            $item->update($data);
            return redirect()->route('conocenos_mas.index')->with('success', 'Registro actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $item = ConocenosMas::findOrFail($id);
            $item->delete();
            return redirect()->route('conocenos_mas.index')->with('success', 'Registro eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el registro: ' . $e->getMessage());
        }
    }

    // Método para la vista del usuario final
    public function showConocenosMasUsuario()
    {
        $conocenosMas = ConocenosMas::first();
        return view('conocenos_mas_usuario', compact('conocenosMas'));
    }
}