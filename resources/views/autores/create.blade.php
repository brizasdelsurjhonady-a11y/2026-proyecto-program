@extends('layouts.app')

@section('title', 'Nuevo autor')

@section('page-title', 'Nuevo autor')

@section('content')

<div class="card">

    <div style="margin-bottom: 25px;">
        <h3>Registrar nuevo autor</h3>

        <p style="
            color: #6b7280;
            margin-top: 6px;
        ">
            Completa los datos del autor para registrarlo en el sistema.
        </p>
    </div>

    {{-- Mensajes de validación --}}
    @if ($errors->any())

        <div style="
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        ">

            <strong>Hay algunos errores:</strong>

            <ul style="margin-top: 8px; padding-left: 20px;">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form
        action="{{ route('autores.store') }}"
        method="POST"
    >

        @csrf

        <div class="form-group">

            <label for="Nombre">
                Nombre
            </label>

            <input
                type="text"
                id="Nombre"
                name="Nombre"
                value="{{ old('Nombre') }}"
                placeholder="Ejemplo: Gabriel"
                maxlength="50"
                required
            >

        </div>

        <div class="form-group">

            <label for="Apellidos">
                Apellidos
            </label>

            <input
                type="text"
                id="Apellidos"
                name="Apellidos"
                value="{{ old('Apellidos') }}"
                placeholder="Ejemplo: García Márquez"
                maxlength="50"
                required
            >

        </div>

        <div class="form-group">

            <label for="telefono">
                Teléfono
            </label>

            <input
                type="tel"
                id="telefono"
                name="telefono"
                value="{{ old('telefono') }}"
                placeholder="Ejemplo: 999888777"
                maxlength="15"
                required
            >

        </div>

        <div class="form-group">

            <label for="correo">
                Correo electrónico
            </label>

            <input
                type="email"
                id="correo"
                name="correo"
                value="{{ old('correo') }}"
                placeholder="Ejemplo: autor@gmail.com"
                maxlength="100"
                required
            >

        </div>

        <div style="
            display: flex;
            gap: 10px;
            margin-top: 25px;
        ">

            <button
                type="submit"
                class="btn btn-success"
            >
                💾 Guardar autor
            </button>

            <a
                href="{{ route('autores.index') }}"
                class="btn"
                style="
                    background: #e5e7eb;
                    color: #374151;
                "
            >
                ↩ Cancelar
            </a>

        </div>

    </form>

</div>

@endsection
