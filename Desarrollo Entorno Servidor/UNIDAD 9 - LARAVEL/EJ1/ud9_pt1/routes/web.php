<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\CuentaController;

/*
Route::get('/', function () {
return view('welcome');
});
*/
Route::get('/', [DefaultController::class, 'home'])->name('home');

//// CUENTAS
Route::get('/cuenta/list', [CuentaController::class, 'list'])->name('cuenta_list');

Route::match(['get', 'post'], '/cuenta/new', [CuentaController::class,
    'new'])->name('cuenta_new');

Route::get('/cuenta/delete/{id}', [CuentaController::class,
    'delete'])->name('cuenta_delete');
