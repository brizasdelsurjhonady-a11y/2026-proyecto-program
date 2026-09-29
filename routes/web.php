<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('inicio');
});

Route::resource('libros', LibroController::class);

Route::resource('autores', AutorController::class);
