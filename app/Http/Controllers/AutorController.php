<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutorController extends Controller
{
    /**
     * Mostrar todos los autores.
     */
    public function index()
    {
        $autores = DB::table('autores')
            ->orderBy('ID_autores', 'desc')
            ->get();

        return view('autores.index', compact('autores'));
    }

    /**
     * Mostrar formulario para crear autor.
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Guardar un nuevo autor.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'Nombre' => 'required|string|max:50',
            'Apellidos' => 'required|string|max:50',
            'telefono' => 'required|digits_between:7,15',
            'correo' => 'required|email|max:100',
        ], [
            'Nombre.required' => 'El nombre es obligatorio.',
            'Nombre.max' => 'El nombre no puede superar los 50 caracteres.',

            'Apellidos.required' => 'Los apellidos son obligatorios.',
            'Apellidos.max' => 'Los apellidos no pueden superar los 50 caracteres.',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.digits_between' => 'El teléfono debe contener entre 7 y 15 dígitos.',

            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'Ingresa un correo electrónico válido.',
            'correo.max' => 'El correo no puede superar los 100 caracteres.',
        ]);

        DB::table('autores')->insert([
            'Nombre' => $datos['Nombre'],
            'Apellidos' => $datos['Apellidos'],
            'telefono' => $datos['telefono'],
            'correo' => $datos['correo'],
        ]);

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor registrado correctamente.');
    }

    /**
     * Mostrar un autor.
     */
    public function show(string $id)
    {
        $autor = DB::table('autores')
            ->where('ID_autores', $id)
            ->first();

        abort_if(!$autor, 404);

        return view('autores.show', compact('autor'));
    }

    /**
     * Mostrar formulario para editar autor.
     */
    public function edit(string $id)
    {
        $autor = DB::table('autores')
            ->where('ID_autores', $id)
            ->first();

        abort_if(!$autor, 404);

        return view('autores.edit', compact('autor'));
    }

    /**
     * Actualizar autor.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'Nombre' => 'required|string|max:50',
            'Apellidos' => 'required|string|max:50',
            'telefono' => 'required|digits_between:7,15',
            'correo' => 'required|email|max:100',
        ], [
            'Nombre.required' => 'El nombre es obligatorio.',
            'Nombre.max' => 'El nombre no puede superar los 50 caracteres.',

            'Apellidos.required' => 'Los apellidos son obligatorios.',
            'Apellidos.max' => 'Los apellidos no pueden superar los 50 caracteres.',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.digits_between' => 'El teléfono debe contener entre 7 y 15 dígitos.',

            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'Ingresa un correo electrónico válido.',
            'correo.max' => 'El correo no puede superar los 100 caracteres.',
        ]);

        DB::table('autores')
            ->where('ID_autores', $id)
            ->update([
                'Nombre' => $datos['Nombre'],
                'Apellidos' => $datos['Apellidos'],
                'telefono' => $datos['telefono'],
                'correo' => $datos['correo'],
            ]);

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor actualizado correctamente.');
    }

    /**
     * Eliminar autor.
     */
    public function destroy(string $id)
    {
        try {

            $eliminado = DB::table('autores')
                ->where('ID_autores', $id)
                ->delete();

            if ($eliminado === 0) {
                return redirect()
                    ->route('autores.index')
                    ->with('error', 'No se encontró el autor que deseas eliminar.');
            }

            return redirect()
                ->route('autores.index')
                ->with('success', 'Autor eliminado correctamente.');

        } catch (\Exception $e) {

            return redirect()
                ->route('autores.index')
                ->with(
                    'error',
                    'No se puede eliminar este autor porque está relacionado con un libro.'
                );
        }
    }
}
