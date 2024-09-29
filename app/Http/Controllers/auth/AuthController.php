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
            return redirect()->intended('logados')
                ->withSuccess('Logado Correctamente');
        }

        // Redirigir de vuelta con un mensaje de error
        return back()->withErrors(['email' => 'Las credenciales son incorrectas.'])
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
}
