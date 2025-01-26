<?php

use App\Http\Controllers\Admin\EdificacionController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PersonaController;
use App\Http\Controllers\Admin\PredioController;
use App\Http\Controllers\Admin\ReporteController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ViaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('/personas', PersonaController::class)->names('admin.personas')
->except('show');

Route::resource('/empresas', EmpresaController::class)->names('admin.empresas')
->except('show');

Route::resource('roles', RoleController::class)->names('admin.roles')
->except('show');

    //->middleware(['can:Gestion de roles']);

Route::resource('/permissions', PermissionController::class)->names('admin.permissions')
    ->except('show');
    //->middleware(['can:Gestion de permisos']);

Route::resource('/users', UserController::class)->names('admin.users')
    ->except('show', 'create', 'store');
    //->middleware(['can:Gestion de usuarios']);

Route::resource('/predios', PredioController::class)->names('admin.predios')->except('show');

Route::get('/predio/prediosos', function(){
        return view('predio.prediosos');
      });

Route::resource('/edificacions', EdificacionController::class)->names('admin.edificacions')->except('show');
Route::resource('reportes', ReporteController::class);
Route::get('/reportes/pdf/{id}', [ReporteController::class, 'pdf']);

Route::resource('/vias', ViaController::class)->names('admin.vias')->except('show');