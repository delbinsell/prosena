<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'inicio');
Route::view('inicio', 'inicio');
Route::view('comopublicar', 'comopublicar');
Route::view('contactar', 'contactar');
Route::view('subirproyecto', 'subirproyecto');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/comopublicar', function () {
    return view('comopublicar');
})->name('comopublicar');

Route::get('/contactar', function () {
    return view('contactar');
})->name('contactar');

Route::get('/subirproyecto', function () {
    return view('subirproyecto');
})->name('subirproyecto');


// Rutas para proyectos
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/buscar', [ProjectController::class, 'search'])->name('buscar');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{id}/pdf', [ProjectController::class, 'showPDF'])->name('projects.showPDF');
// Ruta para mostrar los autores
Route::get('/buscar/autores', [ProjectController::class, 'mostrarAutores'])->name('mostrarAutores');

// Ruta para mostrar los títulos
Route::get('/buscar/titulos', [ProjectController::class, 'mostrarTitulos'])->name('mostrarTitulos');

// Ruta para buscar proyectos por autor
Route::get('/buscar/autor', [ProjectController::class, 'buscarPorAutor'])->name('buscarPorAutor');

// Ruta para buscar proyectos por título
Route::get('/buscar/titulo', [ProjectController::class, 'buscarPorTitulo'])->name('buscarPorTitulo');

Route::get('/buscar/proyectos/{type}/{value}', [ProjectController::class, 'searchProjects'])->name('buscar.proyectos');




// Rutas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});







require __DIR__ . '/auth.php';
