<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ModalidadController extends Controller
{
    public function index()
    {
        $modalidades = Modalidad::all();
        return view('modalidades.index', compact('modalidades'));
    }

    public function create()
    {
        $servicios = Servicio::where('requiere_programas', false)->get();
        return view('modalidades.create', compact('servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'titulo_perfil_ingreso' => 'nullable|string|max:255',
            'desc_perfil_ingreso' => 'nullable|string',
            'link_img_perfil_ingreso' => 'nullable|string|max:255',
            'titulo_perfil_egreso' => 'nullable|string|max:255',
            'desc_perfil_egreso' => 'nullable|string',
            'link_img_perfil_egreso' => 'nullable|string|max:255',
            'titulo_mapa_curricular' => 'nullable|string|max:255',
            'desc_mapa_curricular' => 'nullable|string',
            'link_img_mapa_curricular' => 'nullable|string|max:255',
            'link_video_clase_muestra' => 'nullable|string|max:255',
            'link_img_extra' => 'nullable|string|max:255',
            'desc_extra' => 'nullable|string',
            'servicio_id' => 'required|exists:servicios,id',
        ]);

        $modalidad = Modalidad::create($request->only([
            'titulo',
            'subtitulo',
            'titulo_perfil_ingreso',
            'desc_perfil_ingreso',
            'link_img_perfil_ingreso',
            'titulo_perfil_egreso',
            'desc_perfil_egreso',
            'link_img_perfil_egreso',
            'titulo_mapa_curricular',
            'desc_mapa_curricular',
            'link_img_mapa_curricular',
            'link_video_clase_muestra',
            'link_img_extra',
            'desc_extra',
        ]));
        $modalidad->servicios()->attach($request->servicio_id);

        return redirect()->route('modalidades.index');
    }

    public function show($id)
    {
        $modalidad = Modalidad::findOrFail($id);
        return view('modalidades.show', compact('modalidad'));
    }

    public function edit($id)
    {
        $modalidad = Modalidad::findOrFail($id);
        $servicios = Servicio::where('requiere_programas', false)->get();
        return view('modalidades.edit', compact('modalidad', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'sometimes|required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'titulo_perfil_ingreso' => 'nullable|string|max:255',
            'desc_perfil_ingreso' => 'nullable|string',
            'link_img_perfil_ingreso' => 'nullable|string|max:255',
            'titulo_perfil_egreso' => 'nullable|string|max:255',
            'desc_perfil_egreso' => 'nullable|string',
            'link_img_perfil_egreso' => 'nullable|string|max:255',
            'titulo_mapa_curricular' => 'nullable|string|max:255',
            'desc_mapa_curricular' => 'nullable|string',
            'link_img_mapa_curricular' => 'nullable|string|max:255',
            'link_video_clase_muestra' => 'nullable|string|max:255',
            'link_img_extra' => 'nullable|string|max:255',
            'desc_extra' => 'nullable|string',
            'servicio_id' => 'required|exists:servicios,id',
        ]);

        $modalidad = Modalidad::findOrFail($id);
        $modalidad->update($request->only([
            'titulo',
            'subtitulo',
            'titulo_perfil_ingreso',
            'desc_perfil_ingreso',
            'link_img_perfil_ingreso',
            'titulo_perfil_egreso',
            'desc_perfil_egreso',
            'link_img_perfil_egreso',
            'titulo_mapa_curricular',
            'desc_mapa_curricular',
            'link_img_mapa_curricular',
            'link_video_clase_muestra',
            'link_img_extra',
            'desc_extra',
        ]));
        $modalidad->servicios()->sync($request->servicio_id);

        return redirect()->route('modalidades.index');
    }

    public function destroy($id)
    {
        $modalidad = Modalidad::findOrFail($id);
        $modalidad->delete();
        return redirect()->route('modalidades.index');
    }
}