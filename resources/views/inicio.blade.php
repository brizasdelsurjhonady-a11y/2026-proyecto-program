@extends('layouts.app')

@section('title', 'Inicio')

@section('page-title', 'Panel principal')

@section('content')

<div class="card">

    <h3>Bienvenido al Sistema de Biblioteca 📚</h3>

    <p style="margin-top: 10px; color: #6b7280;">
        Desde este panel puedes administrar los libros y autores
        registrados en el sistema.
    </p>

</div>

<div style="
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
">

    <div class="card">
        <h3>📖 Libros</h3>

        <p style="color: #6b7280; margin: 10px 0 20px;">
            Consulta y administra los libros.
        </p>

        <a href="{{ url('/libros') }}" class="btn btn-primary">
            Ver libros
        </a>
    </div>


    <div class="card">
        <h3>✍️ Autores</h3>

        <p style="color: #6b7280; margin: 10px 0 20px;">
            Administra los autores del sistema.
        </p>

        <a href="{{ route('autores.index') }}" class="btn btn-primary">
            Ver autores
        </a>
    </div>


    <div class="card">
        <h3>➕ Nuevo autor</h3>

        <p style="color: #6b7280; margin: 10px 0 20px;">
            Registra un nuevo autor.
        </p>

        <a href="{{ route('autores.create') }}" class="btn btn-success">
            Crear autor
        </a>
    </div>

</div>

@endsection
