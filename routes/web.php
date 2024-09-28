<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página de inicio o formulario de login
Route::get('/', [AuthController::class, 'index'])->name('auth.home');

// Ruta para manejar el login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Ruta para usuarios autenticados
Route::get('/logados', [AuthController::class, 'logados'])->name('logados');

// CRUD accesible después de la autenticación
Route::get('/crud', [AuthController::class, 'crud'])->name('crud');

// Página de bienvenida
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


// Página de logout
Route::get('/logout', function () {
    return view('logout');
})->name('logout');


// Página de usuario final
Route::get('/index_usuario', function () {
    return view('index_usuario');
})->name('index_usuario');
