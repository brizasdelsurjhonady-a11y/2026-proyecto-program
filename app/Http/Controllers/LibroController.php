<?php

namespace App\Http\Controllers;

use App\Models\Libro;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::with([
            'autor',
            'editor',
            'traductor'
        ])->get();

        return view('libros.index', compact('libros'));
    }
}
