<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ImageController; // Asegúrate de importar tu controlador de imágenes
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AspiranteController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\ProgramaController;

/*
|-------------------------------------------------------------------------- 
| Web Routes 
|-------------------------------------------------------------------------- 
*/

// Página de inicio o formulario de login
Route::get('/', function () {
    return view('welcome'); // Cambia esto para que devuelva la vista de bienvenida
})->name('auth.home');

// Ruta para manejar el login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Ruta para usuarios autenticados
Route::get('/logados', [AuthController::class, 'logados'])->name('logados');

// CRUD accesible después de la autenticación
Route::get('/crud', [AuthController::class, 'crud'])->name('crud');

// Página de logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Página de login (ajustada a tu estructura de carpetas)
Route::get('/login', function () {
    return view('login'); // Asegúrate de que esta vista exista en 'resources/views/login.blade.php'
})->name('login');

// Página de usuario final
Route::get('/index_usuario', function () {
    return view('index_usuario');
})->name('index_usuario');

// Ruta para manejar la carga de imágenes
Route::post('/upload-image', [ImageController::class, 'upload'])->name('upload_image');

//mandar a inicio botón
Route::get('/', function () {
    return view('welcome');
})->name('welcome');




Route::post('/upload-image', [BannerController::class, 'uploadImage'])->name('upload_image');



// Rutas para el CRUD de Aspirantes
Route::get('/aspirantes/create', [AspiranteController::class, 'create'])->name('aspirantes.create');
Route::post('/aspirantes', [AspiranteController::class, 'store'])->name('aspirantes.store');
Route::get('/servicios/{servicio}/programas', [AspiranteController::class, 'getProgramasByServicio']);
Route::resource('aspirantes', AspiranteController::class);

// Ruta para el formulario de aspirantes
Route::get('/contacto', [AspiranteController::class, 'contacto'])->name('contacto');
Route::post('/contacto/enviar', [AspiranteController::class, 'enviarContacto'])->name('contacto.enviar');
Route::get('/servicios/{servicio}/programas', [AspiranteController::class, 'getProgramasByServicio']);

// Rutas para el CRUD de Servicios
Route::resource('servicios', ServicioController::class);

// Rutas para el CRUD de Modalidades
Route::resource('modalidades', ModalidadController::class);
Route::get('servicios/{servicio}/programas', [ModalidadController::class, 'getProgramasByServicio']);

// Rutas para el CRUD de Programas
Route::resource('programas', ProgramaController::class);