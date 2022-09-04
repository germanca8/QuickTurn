<?php

use App\Http\Controllers\InvitadoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('admin/login');
});

Route::get('/api', function () {
    return redirect('api/documentation');
});

//Vista trabajador
Route::get('/{seccion}/trabajador', function ($seccion) {
    return view('inicioTrabajador', compact('seccion'));
})->name('inicioTrabajador');
//Vista cliente 1
Route::get('/{entidad}/cliente', function ($entidad) {
    return view('inicioCliente', compact('entidad'));
})->name('inicioCliente');
//Vista cliente 2
Route::get('/{entidad}/cliente/{invitado}', function ($entidad, $invitado) {
    return view('inicioCita', compact('entidad', 'invitado'));
})->name('crear');


//Sub rutas trabajador
Route::get('turno-aumentar/{seccion}',[ViewController::class,'aumentarTurnoActual'])->name('turno.aumentar');
Route::get('turno-disminuir/{seccion}',[ViewController::class,'disminuirTurnoActual'])->name('turno.disminuir');

//Sub rutas cliente
Route::get('turnos/{seccion}/invitado/{invitado}/solicitaTurnoCliente',[ViewController::class,'solicitaTurnoCliente'])->name('solicitaTurnoCliente')->withoutMiddleware('can');
Route::get('turnos/{seccion}/invitado/{invitado}/verTurnoCliente',[ViewController::class,'verTurnoCliente'])->name('verTurnoCliente')->withoutMiddleware('can');


