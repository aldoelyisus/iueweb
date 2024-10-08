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
	
	        // Si está logado le mostramos la vista de logados
	        return view('auth/logados');
	    }
	
	    // Si no está logado le mostramos la vista con el formulario de login
	    return view('auth/login');
	}
	
    /**
	* Función que se encarga de recibir los datos del formulario de login, comprobar que el usuario existe y
	* en caso correcto logar al usuario
	*/
	public function login(Request $request)
	{
	    // Comprobamos que el email y la contraseña han sido introducidos
	    $request->validate([
	        'email' => 'required',
	        'password' => 'required',
	    ]);
	
	    // Almacenamos las credenciales de email y contraseña
	    $credentials = $request->only('email', 'password');
	
	    // Si el usuario existe lo logamos y lo llevamos a la vista de "logados" con un mensaje
	    if (Auth::attempt($credentials)) {
	        return redirect()->intended('logados')
	            ->withSuccess('Logado Correctamente');
	    }
	
	    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
	    return redirect("/")->withSuccess('Los datos introducidos no son correctos');
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
}
