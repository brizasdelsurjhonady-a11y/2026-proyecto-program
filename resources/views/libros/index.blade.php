@extends('layouts.app')

@section('title', 'Libros')

@section('page-title', 'Biblioteca')

@section('content')

<div class="card">

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
                font-size: 26px;
                color: #111827;
                margin-bottom: 6px;
            ">
                📚 Biblioteca
            </h3>

            <p style="
                color: #6b7280;
                font-size: 14px;
            ">
                Explora y administra el catálogo de libros.
            </p>
        </div>

        <a
            href="{{ route('libros.create') }}"
            class="btn btn-primary"
            style="
                padding: 12px 18px;
                font-weight: bold;
            "
        >
            + Nuevo libro
        </a>

    </div>


    @if(session('success'))

        <div style="
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 25px;
        ">
            ✅ {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div style="
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 25px;
        ">
            ⚠️ {{ session('error') }}
        </div>

    @endif


    <div style="
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 25px;
        color: #6b7280;
        font-size: 14px;
    ">

        <span style="
            background: #eff6ff;
            color: #1d4ed8;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: bold;
        ">
            {{ $libros->count() }} libros
        </span>

        registrados en el catálogo

    </div>


    @if($libros->count() > 0)

        <div style="
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
        ">

            @foreach($libros as $libro)

                <div style="
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 16px;
                    overflow: hidden;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
                    transition: transform 0.2s ease, box-shadow 0.2s ease;
                ">

                    {{-- IMAGEN DEL LIBRO --}}
                    <div style="
                        height: 230px;
                        background: #f3f4f6;
                        position: relative;
                        overflow: hidden;
                    ">

                        @if($libro->archivo)

                            <img
                                src="{{ $libro->archivo }}"
                                alt="Portada de {{ $libro->Titulo }}"
                                style="
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                    display: block;
                                "
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >

                            <div style="
                                display: none;
                                width: 100%;
                                height: 100%;
                                align-items: center;
                                justify-content: center;
                                font-size: 65px;
                                background: linear-gradient(135deg, #172554, #2563eb);
                            ">
                                📚
                            </div>

                        @else

                            <div style="
                                width: 100%;
                                height: 100%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-size: 65px;
                                background: linear-gradient(135deg, #172554, #2563eb);
                            ">
                                📚
                            </div>

                        @endif


                        {{-- TIPO --}}
                        <span style="
                            position: absolute;
                            top: 14px;
                            right: 14px;
                            background: rgba(255,255,255,0.95);
                            color: #1d4ed8;
                            padding: 6px 10px;
                            border-radius: 20px;
                            font-size: 12px;
                            font-weight: bold;
                        ">
                            {{ $libro->Tipo }}
                        </span>

                    </div>


                    {{-- INFORMACIÓN --}}
                    <div style="
                        padding: 20px;
                    ">

                        <h3 style="
                            color: #111827;
                            font-size: 19px;
                            margin-bottom: 8px;
                            line-height: 1.3;
                        ">
                            {{ $libro->Titulo }}
                        </h3>


                        <div style="
                            margin-bottom: 15px;
                        ">

                            <span style="
                                display: inline-block;
                                background: #f3f4f6;
                                color: #4b5563;
                                padding: 5px 9px;
                                border-radius: 6px;
                                font-size: 12px;
                            ">
                                🏷️ {{ $libro->genero }}
                            </span>

                        </div>


                        {{-- AUTOR --}}
                        <div style="
                            display: flex;
                            gap: 10px;
                            align-items: flex-start;
                            margin-bottom: 10px;
                        ">

                            <span style="font-size: 18px;">
                                ✍️
                            </span>

                            <div>

                                <small style="
                                    display: block;
                                    color: #9ca3af;
                                    font-size: 11px;
                                    text-transform: uppercase;
                                    margin-bottom: 2px;
                                ">
                                    Autor
                                </small>

                                <strong style="
                                    color: #374151;
                                    font-size: 13px;
                                ">

                                    @if($libro->autor)

                                        {{ $libro->autor->Nombre }}
                                        {{ $libro->autor->Apellidos }}

                                    @else

                                        Sin autor

                                    @endif

                                </strong>

                            </div>

                        </div>


                        {{-- EDITOR --}}
                        <div style="
                            display: flex;
                            gap: 10px;
                            align-items: flex-start;
                            margin-bottom: 10px;
                        ">

                            <span style="font-size: 18px;">
                                🏢
                            </span>

                            <div>

                                <small style="
                                    display: block;
                                    color: #9ca3af;
                                    font-size: 11px;
                                    text-transform: uppercase;
                                    margin-bottom: 2px;
                                ">
                                    Editor
                                </small>

                                <strong style="
                                    color: #374151;
                                    font-size: 13px;
                                ">

                                    @if($libro->editor)

                                        {{ $libro->editor->Nombre }}
                                        {{ $libro->editor->Apellidos }}

                                    @else

                                        Sin editor

                                    @endif

                                </strong>

                            </div>

                        </div>


                        {{-- TRADUCTOR --}}
                        <div style="
                            display: flex;
                            gap: 10px;
                            align-items: flex-start;
                            margin-bottom: 18px;
                        ">

                            <span style="font-size: 18px;">
                                🌐
                            </span>

                            <div>

                                <small style="
                                    display: block;
                                    color: #9ca3af;
                                    font-size: 11px;
                                    text-transform: uppercase;
                                    margin-bottom: 2px;
                                ">
                                    Traductor
                                </small>

                                <strong style="
                                    color: #374151;
                                    font-size: 13px;
                                ">

                                    @if($libro->traductor)

                                        {{ $libro->traductor->Nombre }}
                                        {{ $libro->traductor->Apellidos }}

                                    @else

                                        Sin traductor

                                    @endif

                                </strong>

                            </div>

                        </div>


                        {{-- BOTONES --}}
                        <div style="
                            border-top: 1px solid #e5e7eb;
                            padding-top: 15px;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            gap: 8px;
                        ">

                            <span style="
                                color: #9ca3af;
                                font-size: 12px;
                            ">
                                ID #{{ $libro->ID_libro }}
                            </span>


                            <div style="
                                display: flex;
                                gap: 6px;
                            ">

                                {{-- EDITAR --}}
                                <a
                                    href="{{ route('libros.edit', $libro->ID_libro) }}"
                                    class="btn"
                                    style="
                                        background: #fef3c7;
                                        color: #92400e;
                                        padding: 8px 11px;
                                        font-size: 12px;
                                    "
                                >
                                    ✏️ Editar
                                </a>


                                {{-- ELIMINAR --}}
                                <form
                                    action="{{ route('libros.destroy', $libro->ID_libro) }}"
                                    method="POST"
                                    style="display: inline;"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        style="
                                            padding: 8px 11px;
                                            font-size: 12px;
                                        "
                                        onclick="return confirm('¿Estás seguro de eliminar este libro?')"
                                    >
                                        🗑️ Eliminar
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div style="
            text-align: center;
            padding: 70px 20px;
            border: 2px dashed #d1d5db;
            border-radius: 16px;
            background: #f9fafb;
        ">

            <div style="
                font-size: 60px;
                margin-bottom: 15px;
            ">
                📚
            </div>

            <h3 style="
                color: #374151;
                margin-bottom: 8px;
            ">
                No hay libros registrados
            </h3>

            <p style="
                color: #9ca3af;
                margin-bottom: 20px;
            ">
                Comienza agregando el primer libro al catálogo.
            </p>

            <a
                href="{{ route('libros.create') }}"
                class="btn btn-primary"
            >
                + Registrar primer libro
            </a>

        </div>

    @endif

</div>

@endsection
