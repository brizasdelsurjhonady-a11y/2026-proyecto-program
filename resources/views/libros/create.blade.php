@extends('layouts.app')

@section('title', 'Nuevo libro')

@section('page-title', 'Nuevo libro')

@section('content')

<div class="card">

    {{-- ENCABEZADO --}}
    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    ">

        <div>
            <h3 style="
                font-size: 24px;
                color: #111827;
                margin-bottom: 6px;
            ">
                📚 Registrar nuevo libro
            </h3>

            <p style="
                color: #6b7280;
                font-size: 14px;
            ">
                Completa la información bibliográfica del libro.
            </p>
        </div>

        <a
            href="{{ route('libros.index') }}"
            class="btn"
            style="
                background: #f3f4f6;
                color: #374151;
            "
        >
            ← Volver a libros
        </a>

    </div>


    {{-- ERRORES DE VALIDACIÓN --}}
    @if ($errors->any())

        <div style="
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 16px;
            border-radius: 10px;
            margin-bottom: 25px;
        ">

            <strong>Revisa los siguientes datos:</strong>

            <ul style="
                margin-top: 8px;
                padding-left: 20px;
            ">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORMULARIO --}}
    <form
        action="{{ route('libros.store') }}"
        method="POST"
    >

        @csrf


        {{-- INFORMACIÓN PRINCIPAL --}}
        <div style="
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 22px;
        ">

            <h4 style="
                color: #1e3a8a;
                margin-bottom: 20px;
                font-size: 17px;
            ">
                📖 Información del libro
            </h4>


            <div style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 20px;
            ">

                {{-- TÍTULO --}}
                <div class="form-group">

                    <label for="Titulo">
                        Título del libro *
                    </label>

                    <input
                        type="text"
                        id="Titulo"
                        name="Titulo"
                        value="{{ old('Titulo') }}"
                        placeholder="Ejemplo: Cien años de soledad"
                        maxlength="255"
                        required
                    >

                </div>


                {{-- TIPO --}}
                <div class="form-group">

                    <label for="Tipo">
                        Tipo *
                    </label>

                    <select
                        id="Tipo"
                        name="Tipo"
                        required
                    >

                        <option value="">
                            Selecciona un tipo
                        </option>

                        <option
                            value="Libro"
                            {{ old('Tipo') == 'Libro' ? 'selected' : '' }}
                        >
                            Libro
                        </option>

                        <option
                            value="Novela"
                            {{ old('Tipo') == 'Novela' ? 'selected' : '' }}
                        >
                            Novela
                        </option>

                        <option
                            value="Cuento"
                            {{ old('Tipo') == 'Cuento' ? 'selected' : '' }}
                        >
                            Cuento
                        </option>

                        <option
                            value="Poesía"
                            {{ old('Tipo') == 'Poesía' ? 'selected' : '' }}
                        >
                            Poesía
                        </option>

                        <option
                            value="Ensayo"
                            {{ old('Tipo') == 'Ensayo' ? 'selected' : '' }}
                        >
                            Ensayo
                        </option>

                    </select>

                </div>


                {{-- GÉNERO --}}
                <div class="form-group">

                    <label for="genero">
                        Género *
                    </label>

                    <input
                        type="text"
                        id="genero"
                        name="genero"
                        value="{{ old('genero') }}"
                        placeholder="Ejemplo: Literatura"
                        maxlength="100"
                        required
                    >

                </div>


                {{-- ARCHIVO --}}
                <div class="form-group">

                    <label for="archivo">
                        Archivo
                    </label>

                    <input
                        type="text"
                        id="archivo"
                        name="archivo"
                        value="{{ old('archivo') }}"
                        placeholder="Nombre o ruta del archivo"
                        maxlength="255"
                    >

                </div>

            </div>

        </div>


        {{-- RELACIONES --}}
        <div style="
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 22px;
        ">

            <h4 style="
                color: #1e3a8a;
                margin-bottom: 20px;
                font-size: 17px;
            ">
                👥 Personas relacionadas
            </h4>


            <div style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 20px;
            ">


                {{-- AUTOR --}}
                <div class="form-group">

                    <label for="ID_autor">
                        ✍️ Autor *
                    </label>

                    <select
                        id="ID_autor"
                        name="ID_autor"
                        required
                    >

                        <option value="">
                            Selecciona un autor
                        </option>

                        @foreach($autores as $autor)

                            <option
                                value="{{ $autor->ID_autores }}"
                                {{ old('ID_autor') == $autor->ID_autores ? 'selected' : '' }}
                            >

                                {{ $autor->Nombre }}
                                {{ $autor->Apellidos }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- EDITOR --}}
                <div class="form-group">

                    <label for="ID_editor">
                        🏢 Editor *
                    </label>

                    <select
                        id="ID_editor"
                        name="ID_editor"
                        required
                    >

                        <option value="">
                            Selecciona un editor
                        </option>

                        @foreach($editores as $editor)

                            <option
                                value="{{ $editor->ID_editores }}"
                                {{ old('ID_editor') == $editor->ID_editores ? 'selected' : '' }}
                            >

                                {{ $editor->Nombre }}
                                {{ $editor->Apellidos }}

                                @if($editor->nombre_editorial)
                                    — {{ $editor->nombre_editorial }}
                                @endif

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- TRADUCTOR --}}
                <div class="form-group">

                    <label for="ID_traductor">
                        🌐 Traductor *
                    </label>

                    <select
                        id="ID_traductor"
                        name="ID_traductor"
                        required
                    >

                        <option value="">
                            Selecciona un traductor
                        </option>

                        @foreach($traductores as $traductor)

                            <option
                                value="{{ $traductor->ID_traductores }}"
                                {{ old('ID_traductor') == $traductor->ID_traductores ? 'selected' : '' }}
                            >

                                {{ $traductor->Nombre }}
                                {{ $traductor->Apellidos }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

        </div>


        {{-- BOTONES --}}
        <div style="
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
        ">

            <a
                href="{{ route('libros.index') }}"
                class="btn"
                style="
                    background: #e5e7eb;
                    color: #374151;
                "
            >
                Cancelar
            </a>

            <button
                type="submit"
                class="btn btn-success"
                style="
                    padding: 12px 20px;
                    font-weight: bold;
                "
            >
                💾 Guardar libro
            </button>

        </div>

    </form>

</div>

@endsection
