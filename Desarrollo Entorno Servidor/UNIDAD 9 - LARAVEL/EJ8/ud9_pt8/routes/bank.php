<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\ClienteController;

/*
Route::get('/', function () {
return view('welcome');
});
*/

Route::get('/', [DefaultController::class, 'home'])->name('home');

// CUENTAS -----------------------------
Route::get('/cuenta/list', [CuentaController::class, 'list'])->name('cuenta_list');

Route::middleware('auth')->group(function () {
    Route::match(['get', 'post'], '/cuenta/new', [CuentaController::class, 'new'])->name('cuenta_new');
    Route::match(['get', 'post'], '/cuenta/edit/{id}', [CuentaController::class, 'edit'])->name('cuenta_edit');
    Route::get('/cuenta/delete/{id}', [CuentaController::class, 'delete'])->name('cuenta_delete');
});

//FILTRO DE CUENTAS
Route::get('/cuenta/filtro', [CuentaController::class, 'filtro'])->name('cuenta_filtro');

//ESTADISTICAS DE CUENTAS
Route::get('/cuenta/stats', [DefaultController::class, 'stats'])->name('cuenta_stats');

// CLIENTES -----------------------------
Route::get('/cliente/list', [ClienteController::class, 'list'])->name('cliente_list');

Route::middleware('auth')->group(function () {
    Route::match(['get', 'post'], '/cliente/new', [ClienteController::class, 'new'])->name('cliente_new');
    Route::match(['get', 'post'], '/cliente/edit/{id}', [ClienteController::class, 'edit'])->name('cliente_edit');
    Route::get('/cliente/delete/{id}', [ClienteController::class, 'delete'])->name('cliente_delete');
});
