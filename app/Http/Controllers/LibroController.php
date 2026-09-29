<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use App\Models\Editor;
use App\Models\Traductor;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Mostrar todos los libros.
     */
    public function index()
    {
        $libros = Libro::with([
            'autor',
            'editor',
            'traductor'
        ])
        ->orderBy('ID_libro', 'desc')
        ->get();

        return view('libros.index', compact('libros'));
    }

    /**
     * Mostrar formulario para crear libro.
     */
    public function create()
    {
        $autores = Autor::orderBy('Nombre')->get();
        $editores = Editor::orderBy('Nombre')->get();
        $traductores = Traductor::orderBy('Nombre')->get();

        return view('libros.create', compact(
            'autores',
            'editores',
            'traductores'
        ));
    }

    /**
     * Guardar nuevo libro.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'Titulo' => 'required|string|max:255',
            'Tipo' => 'required|string|max:100',
            'ID_autor' => 'required|integer',
            'ID_editor' => 'required|integer',
            'ID_traductor' => 'required|integer',
            'genero' => 'required|string|max:100',
            'archivo' => 'nullable|string|max:255',
        ], [
            'Titulo.required' => 'El título es obligatorio.',
            'Tipo.required' => 'El tipo de libro es obligatorio.',
            'ID_autor.required' => 'Debes seleccionar un autor.',
            'ID_editor.required' => 'Debes seleccionar un editor.',
            'ID_traductor.required' => 'Debes seleccionar un traductor.',
            'genero.required' => 'El género es obligatorio.',
        ]);

        Libro::create($datos);

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro registrado correctamente.');
    }

    /**
     * Mostrar un libro.
     */
    public function show(string $id)
    {
        $libro = Libro::with([
            'autor',
            'editor',
            'traductor'
        ])->findOrFail($id);

        return view('libros.show', compact('libro'));
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(string $id)
    {
        $libro = Libro::findOrFail($id);

        $autores = Autor::orderBy('Nombre')->get();
        $editores = Editor::orderBy('Nombre')->get();
        $traductores = Traductor::orderBy('Nombre')->get();

        return view('libros.edit', compact(
            'libro',
            'autores',
            'editores',
            'traductores'
        ));
    }

    /**
     * Actualizar libro.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'Titulo' => 'required|string|max:255',
            'Tipo' => 'required|string|max:100',
            'ID_autor' => 'required|integer',
            'ID_editor' => 'required|integer',
            'ID_traductor' => 'required|integer',
            'genero' => 'required|string|max:100',
            'archivo' => 'nullable|string|max:255',
        ]);

        $libro = Libro::findOrFail($id);

        $libro->update($datos);

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Eliminar libro.
     */
    public function destroy(string $id)
    {
        $libro = Libro::findOrFail($id);

        $libro->delete();

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro eliminado correctamente.');
    }
}
