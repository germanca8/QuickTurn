<?php

use App\Http\Controllers\EntidadController;
use App\Http\Controllers\InvitadoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('guest')->group(function(){

    Route::post('/login',[UserController::class,'login'])->name('user.login')->withoutMiddleware('guest');
    Route::post('seccions/{seccion}/aumentarTurnoActual',[SeccionController::class,'aumentarTurnoActual'])->withoutMiddleware('can');
    Route::get('seccions/{seccion}/verTurnoActual',[SeccionController::class,'verTurnoActual'])->withoutMiddleware('can');
    Route::get('turnos/{seccion}/invitado/{invitado}/solicitaTurno',[InvitadoController::class,'solicitaTurno'])->name('solicitaTurno')->withoutMiddleware('can');
    Route::get('turnos/{seccion}/invitado/{invitado}/verTurno',[InvitadoController::class,'verTurno'])->name('verTurno')->withoutMiddleware('can');


    Route::get('invitados-store/{entidad}',[ViewController::class,'storeInvitado'])->name('invitados.storeInvitado')->withoutMiddleware('can');

    Route::apiResource('entidads',EntidadController::class)->except('store','update');
    Route::apiResource('seccions',SeccionController::class)->except('store','update');
    Route::apiResource('turnos',TurnoController::class)->except('store','update');
    Route::apiResource('invitados',InvitadoController::class);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('entidads',EntidadController::class);
    Route::apiResource('seccions',SeccionController::class);
    Route::apiResource('turnos',TurnoController::class);

    Route::post('entidads/users',[EntidadController::class,'entidadsUser'])->name('entidadsUser');
    Route::post('seccions/{entidad}',[SeccionController::class,'seccionsEntidad'])->name('seccionsEntidad');
    Route::post('turnos/{seccion}',[TurnoController::class,'turnosSeccion'])->name('turnosSeccion');
    Route::delete('turnos/{seccion}/eliminar',[TurnoController::class,'destroyAllFromSeccion'])->name('destroyAllFromSeccion');
});
