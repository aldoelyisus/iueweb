<?php
// app/Http/Controllers/AspiranteController.php
namespace App\Http\Controllers;

use App\Models\Aspirante;
use App\Models\Servicio;
use App\Models\Programa;
use Illuminate\Http\Request;

class AspiranteController extends Controller
{
    public function index(Request $request)
    {
        try {
            $servicios = Servicio::all();
            $programas = Programa::all();

            $aspirantes = Aspirante::query();

            if ($request->filled('nombre_servicio')) {
                $aspirantes->where('nombre_servicio', $request->nombre_servicio);
            }

            if ($request->filled('nombre_programa')) {
                $aspirantes->where('nombre_programa', $request->nombre_programa);
            }

            if ($request->filled('nombrecompleto')) {
                $aspirantes->where('nombrecompleto', 'like', '%' . $request->nombrecompleto . '%');
            }

            $aspirantes = $aspirantes->get();

            return view('aspirantes.index', compact('aspirantes', 'servicios', 'programas'));
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function create()
    {
        $servicios = Servicio::all();
        return view('aspirantes.create', compact('servicios'));
    }

    public function contacto()
    {
        try {
            $servicios = Servicio::all();
            $programas = Programa::all();
            return view('aspirantes.contacto', compact('servicios', 'programas'));
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTrace()); // Imprimir el error para depuración
        }
    }

    public function store(Request $request)
    {
        try {
            // Mostrar los datos del request para depuración
            dd($request->all());

            // Validar los datos del request
            $request->validate([
                'nombrecompleto' => 'required|string|max:255',
                'edad' => 'required|integer',
                'telefono' => 'required|string|max:15',
                'email' => 'required|email|max:255',
                'servicio_id' => 'required|exists:servicios,id',
                'programa_id' => 'nullable|exists:programas,id',
            ]);

            // Buscar el servicio y el programa (si está presente)
            $servicio = Servicio::findOrFail($request->servicio_id);
            $programa = $request->filled('programa_id') ? Programa::findOrFail($request->programa_id) : null;

            // Crear el aspirante
            $aspirante = Aspirante::create([
                'nombrecompleto' => $request->nombrecompleto,
                'edad' => $request->edad,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'nombre_servicio' => $servicio->nombre,
                'nombre_programa' => $programa ? $programa->nombre : null,
            ]);

            // Redirigir a la lista de aspirantes
            return redirect()->route('aspirantes.index')->with('success', 'Aspirante creado exitosamente.');
        } catch (\Exception $e) {
            // Mostrar el error para depuración
            dd($e->getMessage(), $e->getTrace());
        }
    }

    public function enviarContacto(Request $request)
    {
        //dd($request->all());
        try {
            // Validar los datos del request
            $request->validate([
                'nombrecompleto' => 'required|string|max:255',
                'edad' => 'required|integer',
                'telefono' => 'required|string|max:15',
                'email' => 'required|email|max:255',
                'servicio_id' => 'required|exists:servicios,id',
                'programa_id' => 'nullable|exists:programas,id',
            ]);

            // Buscar el servicio y el programa (si está presente)
            $servicio = Servicio::findOrFail($request->servicio_id);
            $programa = $request->filled('programa_id') ? Programa::findOrFail($request->programa_id) : null;

            // Lógica para manejar el envío del formulario de contacto
            Aspirante::create([
                'nombrecompleto' => $request->nombrecompleto,
                'edad' => $request->edad,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'servicio_id' => $request->servicio_id,
                'programa_id' => $request->programa_id,
                'nombre_servicio' => $servicio->nombre,
                'nombre_programa' => $programa ? $programa->nombre : null,
            ]);

            // Redirigir a la página de bienvenida con un mensaje de éxito
            return redirect()->route('welcome')->with('success', 'Mensaje enviado correctamente.');
        } catch (\Exception $e) {
            // Mostrar el error para depuración
            return redirect()->back()->with('error', 'Error al enviar el mensaje: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $aspirante = Aspirante::findOrFail($id);
        return view('aspirantes.show', compact('aspirante'));
    }

    public function edit($id)
    {
        $aspirante = Aspirante::findOrFail($id);
        $servicios = Servicio::all();
        return view('aspirantes.edit', compact('aspirante', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombrecompleto' => 'required|string|max:255',
            'edad' => 'required|integer',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'servicio_id' => 'required|exists:servicios,id',
            'programa_id' => 'nullable|exists:programas,id',
        ]);

        $servicio = Servicio::findOrFail($request->servicio_id);
        $programa = $request->filled('programa_id') ? Programa::findOrFail($request->programa_id) : null;

        $aspirante = Aspirante::findOrFail($id);
        $aspirante->update([
            'nombrecompleto' => $request->nombrecompleto,
            'edad' => $request->edad,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'nombre_servicio' => $servicio->nombre,
            'nombre_programa' => $programa ? $programa->nombre : null,
        ]);

        return redirect()->route('aspirantes.index');
    }

    public function destroy($id)
    {
        $aspirante = Aspirante::findOrFail($id);
        $aspirante->delete();
        return redirect()->route('aspirantes.index');
    }

    public function getProgramasByServicio($servicio_id)
    {
        $servicio = Servicio::findOrFail($servicio_id);
        $programas = $servicio->programas;
        return response()->json($programas);
    }
}