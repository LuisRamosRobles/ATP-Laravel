<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenistasController;
use App\Http\Controllers\TorneoController;

Route::get('/', function () {
    return redirect()->route('tenistas.index');
});

Route::group(['prefix' => 'tenistas'], function () {
    //Ruta index: muestra la lista de tenistas
    Route::get('/', [TenistasController::class, 'index'])->name('tenistas.index');
    //Ruta create: muestra un formulario para crear un nuevo tenista
    Route::get('/create', [TenistasController::class, 'create'])->name('tenistas.create')->middleware('auth', 'admin');
    //Ruta store: guarda un nuevo tenista
    Route::post('/tenistas', [TenistasController::class,'store'])->name('tenistas.store')->middleware('auth', 'admin');
    //Ruta show: muestra los detalles de un tenista
    Route::get('/{id}', [TenistasController::class,'show'])->name('tenistas.show')->middleware('auth');
    //Ruta edit: muestra un formulario para editar un tenista
    Route::get('/{id}/edit', [TenistasController::class, 'edit'])->name('tenistas.edit')->middleware('auth', 'admin');
    //Ruta update: actualiza un tenista
    Route::patch('/{id}', [TenistasController::class, 'update'])->name('tenistas.update')
        ->middleware('auth', 'admin');
    //Ruta destroy: elimina un tenista
    Route::delete('/{id}', [TenistasController::class, 'destroy'])->name('tenistas.destroy')
        ->middleware('auth', 'admin');
    //Ruta PDF: genera un pdf con la información del tenistas
    Route::get('/{id}/pdf', [TenistasController::class, 'generarPdf'])->name('generar.pdf')->middleware('auth');

});

Route::group(['prefix' => 'torneos'], function () {
    //Ruta index: muestra la lista de torneos
    Route::get('/', [TorneoController::class, 'index'])->name('torneos.index');
    //Ruta create: muestra un formulario para crear un nuevo torneo
    Route::get('/create', [TorneoController::class, 'create'])->name('torneos.create')->middleware('auth', 'admin');
    //Ruta store: guarda un nuevo torneo
    Route::post('/torneos', [TorneoController::class,'store'])->name('torneos.store')->middleware('auth', 'admin');
    //Ruta show: muestra los detalles de un torneo
    Route::get('/show/{id}', [TorneoController::class,'show'])->name('torneos.show');
    //Ruta edit: muestra un formulario para editar un torneo
    Route::get('/edit/{id}', [TorneoController::class, 'edit'])->name('torneos.edit')->middleware('auth', 'admin');
    //Ruta update: actualiza un torneo
    Route::patch('/torneos/{id}', [TorneoController::class, 'update'])->name('torneos.update')
        ->middleware('auth', 'admin');
    //Ruta destroy: elimina un torneo
    Route::delete('/torneos/{id}', [TorneoController::class, 'destroy'])->name('torneos.destroy')
        ->middleware('auth', 'admin');
    //Ruta Listado Participantes: muestra el listado de participantes de un torneo
    Route::get('/participantes/{id}', [TorneoController::class, 'listaParticipantes'])->name('torneos.participantes')
        ->middleware('auth');
    //Ruta Añadir Participante: añade un tenista al listado de un torneo
    Route::post('/participantes/{id}/add-tenista', [TorneoController::class, 'addTenista'])->name('torneos.addTenista')
        ->middleware('auth', 'admin');
    //Ruta Eliminar Participante: elimina un tenista del listado de un torneo
    Route::delete('/participantes/{id}/remove-tenista', [TorneoController::class, 'removeTenista'])
        ->name('torneos.removeTenista')->middleware('auth', 'admin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
