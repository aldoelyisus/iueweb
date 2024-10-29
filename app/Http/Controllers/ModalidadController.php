<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use App\Models\Servicio;
use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Asegúrate de importar la clase Storage

class ModalidadController extends Controller
{
    public function index()
    {
        $modalidades = Modalidad::with('servicios.programas')->get();
        return view('modalidades.index', compact('modalidades'));
    }

    public function create()
    {
        $servicios = Servicio::all();
        return view('modalidades.create', compact('servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'titulo_perfil_ingreso' => 'nullable|string|max:255',
            'desc_perfil_ingreso' => 'nullable|string',
            'link_img_perfil_ingreso' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titulo_perfil_egreso' => 'nullable|string|max:255',
            'desc_perfil_egreso' => 'nullable|string',
            'link_img_perfil_egreso' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titulo_mapa_curricular' => 'nullable|string|max:255',
            'desc_mapa_curricular' => 'nullable|string',
            'link_img_mapa_curricular' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link_video_clase_muestra' => 'nullable|string|max:255',
            'link_img_extra' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc_extra' => 'nullable|string',
            'servicio_id' => 'required|exists:servicios,id',
            'programa_id' => 'nullable|exists:programas,id',
        ]);
    
        try {
            $data = $request->only([
                'titulo',
                'subtitulo',
                'titulo_perfil_ingreso',
                'desc_perfil_ingreso',
                'titulo_perfil_egreso',
                'desc_perfil_egreso',
                'titulo_mapa_curricular',
                'desc_mapa_curricular',
                'link_video_clase_muestra',
                'desc_extra',
            ]);
    
            foreach (['link_img_perfil_ingreso', 'link_img_perfil_egreso', 'link_img_mapa_curricular', 'link_img_extra'] as $imgField) {
                if ($request->hasFile($imgField)) {
                    $file = $request->file($imgField);
                    $path = $file->store('public/modalidades');
                    $data[$imgField] = Storage::url($path);
                }
            }
    
            $modalidad = Modalidad::create($data);
            $modalidad->servicios()->attach($request->servicio_id);
    
            if ($request->filled('programa_id')) {
                $modalidad->programas()->attach($request->programa_id);
            }
    
            return redirect()->route('modalidades.index')->with('success', 'Modalidad creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear la modalidad: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $modalidad = Modalidad::findOrFail($id);
        return view('modalidades.show', compact('modalidad'));
    }

    public function edit($id)
    {
        $modalidad = Modalidad::findOrFail($id);
        $servicios = Servicio::all();
        return view('modalidades.edit', compact('modalidad', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'titulo_perfil_ingreso' => 'nullable|string|max:255',
            'desc_perfil_ingreso' => 'nullable|string',
            'link_img_perfil_ingreso' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titulo_perfil_egreso' => 'nullable|string|max:255',
            'desc_perfil_egreso' => 'nullable|string',
            'link_img_perfil_egreso' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titulo_mapa_curricular' => 'nullable|string|max:255',
            'desc_mapa_curricular' => 'nullable|string',
            'link_img_mapa_curricular' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link_video_clase_muestra' => 'nullable|string|max:255',
            'link_img_extra' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc_extra' => 'nullable|string',
            'servicio_id' => 'required|exists:servicios,id',
            'programa_id' => 'nullable|exists:programas,id',
        ]);

        try {
            $modalidad = Modalidad::findOrFail($id);

            $data = $request->only([
                'titulo',
                'subtitulo',
                'titulo_perfil_ingreso',
                'desc_perfil_ingreso',
                'titulo_perfil_egreso',
                'desc_perfil_egreso',
                'titulo_mapa_curricular',
                'desc_mapa_curricular',
                'link_video_clase_muestra',
                'desc_extra',
            ]);

            foreach (['link_img_perfil_ingreso', 'link_img_perfil_egreso', 'link_img_mapa_curricular', 'link_img_extra'] as $imgField) {
                if ($request->hasFile($imgField)) {
                    // Eliminar la imagen anterior si existe
                    if ($modalidad->$imgField) {
                        Storage::delete(str_replace('/storage', 'public', $modalidad->$imgField));
                    }

                    // Subir la nueva imagen
                    $file = $request->file($imgField);
                    $path = $file->store('public/modalidades');
                    $data[$imgField] = Storage::url($path);
                }
            }

            $modalidad->update($data);
            $modalidad->servicios()->sync($request->servicio_id);

            if ($request->filled('programa_id')) {
                $modalidad->programas()->sync($request->programa_id);
            } else {
                $modalidad->programas()->detach();
            }

            return redirect()->route('modalidades.index')->with('success', 'Modalidad actualizada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar la modalidad: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $modalidad = Modalidad::findOrFail($id);
            $modalidad->delete();
            return redirect()->route('modalidades.index')->with('success', 'Modalidad eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar la modalidad: ' . $e->getMessage());
        }
    }

    public function getProgramasByServicio($servicio_id)
    {
        $servicio = Servicio::findOrFail($servicio_id);
        $programas = $servicio->programas;
        return response()->json($programas);
    }

    public function getModalidadesByServicio($servicio_id)
    {
        $servicio = Servicio::findOrFail($servicio_id);
        $modalidades = $servicio->modalidades;
        return response()->json($modalidades);
    }
}