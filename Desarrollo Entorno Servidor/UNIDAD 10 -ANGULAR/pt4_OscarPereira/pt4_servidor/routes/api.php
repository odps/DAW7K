<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// GET
Route::get('/libros', [ApiController::class, 'getLibros']);
Route::get('libro/{id}', [ApiController::class, 'getLibro']);
Route::get('autores', [ApiController::class, 'getAutores']);
Route::get('autor/{id}', [ApiController::class, 'getAutor']);

// POST
Route::post('libro', [ApiController::class, 'createLibro']);
Route::post('autor', [ApiController::class, 'createAutor']);

// PUT
Route::put('autor/{id}', [ApiController::class, 'updateAutor']);
Route::put('libro/{id}', [ApiController::class, 'updateLibro']);

// DELETE
Route::delete('libro/{id}', [ApiController::class, 'deleteLibro']);
Route::delete('autor/{id}', [ApiController::class, 'deleteAutor']);
