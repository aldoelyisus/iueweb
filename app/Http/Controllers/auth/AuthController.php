<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;

class AuthController extends Controller
{
    /**
    * Función que muestra la vista de logados o la vista con el formulario de Login
    */
    public function index()
    {
        // Comprobamos si el usuario ya está logado
        if (Auth::check()) {
            return view('auth/logados'); // Vista si ya está logado
        }

        // Vista con el formulario de login
        return view('auth/login');
    }

    /**
    * Función que se encarga de recibir los datos del formulario de login, comprobar que el usuario existe y
    * en caso correcto logar al usuario
    */
    public function login(Request $request)
    {
        // Validar las credenciales
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Obtener las credenciales
        $credentials = $request->only('email', 'password');
    
        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Mensaje de bienvenida personalizado
            $request->session()->flash('success', 'Bienvenido al administrador');
            
            // Redirigir a una página donde se mostrará el mensaje y luego redirigir a la página deseada
            return redirect()->route('login'); // O cualquier otra ruta temporal
        }
    
        // Redirigir de vuelta con un mensaje de error
        return back()->withErrors(['email' => 'Usuario o Contraseña incorrecta.'])
                     ->withInput($request->only('email')); // Mantener el email ingresado
    }
    

    

    /**
    * Función que muestra la vista de logados si el usuario está logado y si no le devuelve al formulario de login
    * con un mensaje de error
    */
    public function logados()
    {
        if (Auth::check()) {
            return view('auth/logados'); // Cambia a la vista del dashboard
        }

        return redirect("/")->withSuccess('No tienes acceso, por favor inicia sesión');
    }

    public function crud()
    {
        return view('crud'); // Asegúrate que 'crud' corresponde a la vista en resources/views/crud.blade.php
    }

    /**
    * Método para cerrar sesión.
    */
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario autenticado
        
        // Redirecciona a la página de inicio de sesión
        return redirect()->route('login')->with('message', 'Has cerrado sesión con éxito.');
 
 
   }

   public function uploadImage(Request $request)
{
    // Valida la imagen
    $request->validate([
        'image' => 'required|mimes:jpg,png,jpeg|max:2048',
        'banner_index' => 'required|integer',
    ]);

    // Subir la nueva imagen
    $image = $request->file('image');
    $imageName = time() . '-' . $image->getClientOriginalName();
    $image->move(public_path('img'), $imageName);

    // Actualiza la ruta de la imagen en la sesión
    $images = session('images', [
        'img/img1.png',
        'img/banner-1.png',
        'img/banner-2.png',
        'img/banner-3.png'
    ]);

    $images[$request->banner_index] = 'img/' . $imageName;

    // Guardar la nueva lista de imágenes en la sesión
    session(['images' => $images]);

    return redirect()->back()->with('success', 'Imagen reemplazada exitosamente.');
}

public function store(Request $request)
{
    // Validar los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'servicio_id' => 'required|exists:servicios,id',
    ]);

    // Crear el programa
    Programa::create($request->all());

    // Redirigir con un mensaje de éxito
    return redirect()->route('programas.index')->with('success', 'Programa creado exitosamente.');
}

}